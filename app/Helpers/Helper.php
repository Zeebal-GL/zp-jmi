<?php

namespace App\Helpers;

use App;
use Auth;
use App\User;
use App\Models\Front\User\Investor;
use App\Models\Admin\Master\Country;
use App\Models\Admin\Master\Language;
use App\Models\Front\Trade\Feedback;
use App\Models\EmailTemplate\EmailTemplate;
use App\Models\Admin\SiteSetting\SiteSetting;
use App\Models\Admin\Master\UserReferralPercentage;
use App\Models\ActivityLog\ActivityLog;
use Illuminate\Contracts\Encryption\Encrypter;
use Captcha;
use Request;

class Helper {

    /**
     * getPageDetailByLocation
     * @param
     * @return
     * @since 0.1
     * @author Megehndra S Yadav
     */
   public static function getCurrentCountryId() {

        if (Auth::check()) {
            $loginUserCountryCode = Helper::getLoginCountryCode(Auth::user()->investor_id);
        } else {
            $loginUserCountryCode = '';
        }

        if (env('APP_ENV') != 'production') {

            //$ip = file_get_contents('https://api.ipify.org');

            $ip = '';
            $ipAddrs = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
            $countryCode = '+91';//geoip_country_code_by_name($ipAddrs);
        } else {
            $ipAddrs = $_SERVER['HTTP_CF_CONNECTING_IP'];

            $key = '375777273b7aed';
            $url = json_decode(file_get_contents("http://ipinfo.io/".$ipAddrs."?token=".$key));
            $countryCode = $url->country;
        }  

        if ($loginUserCountryCode == '' || $loginUserCountryCode == null || $loginUserCountryCode == '-') {
            $loginUserCountryCode = $countryCode;
        }
        $loginUserCountryId = App\Helpers\Helper::getCountryIdByCode($loginUserCountryCode);

        return empty($loginUserCountryId) ? '' : $loginUserCountryId;
    }


    /**
     * getPageDetailByLocation
     * @param
     * @return
     * @since 0.1
     * @author Megehndra S Yadav
     */
    public static function getAdminDetail() {
        $admin_data = SiteSetting::getAllSettings();
        $arrData = [];
        foreach ($admin_data as $settingdata) {
            $arrData[$settingdata->option_name] = $settingdata->option_value;
        }
        return $arrData;
    }

    /**
     * getPageDetailByLocation
     * @param
     * @return
     * @since 0.1
     * @author Megehndra S Yadav
     */
    public static function getAlCountries() {
        $country = Country::getAllCountries();
        return $country;
    }

    /**
     * getPageDetailByLocation
     * @param
     * @return
     * @since 0.1
     * @author Megehndra S Yadav
     */
    public static function getUserDetail() {
        $data = User::getUserWithPersonalDetails(Auth::id());
        return $data;
    }

    /**
     * getPageDetailByLocation
     * @param
     * @return
     * @since 0.1
     * @author Megehndra S Yadav
     */
    public static function getUserName($investor_id) {
        $data = Investor::getUserName($investor_id);
        return $data;
    }

    /**
     * getPageDetailByLocation
     * @param
     * @return
     * @since 0.1
     * @author Megehndra S Yadav
     */
    public static function getTotalRefferalToken($referBy, $userID) {
        $data = UserReferralPercentage::getReferralDataByID($referBy, $userID);
        return $data;
    }

    /**
     * getPageDetailByLocation
     * @param
     * @return
     * @since 0.1
     * @author Megehndra S Yadav
     */
    public static function getParentName($investor_id) {
        $data = UserReferralPercentage::getParentName($investor_id);
        return $data;
    }

    /**
     * getPageDetailByLocation
     * @param
     * @return
     * @since 0.1
     * @author Megehndra S Yadav
     */
    public static function shootDebugEmail($exception, $handler = false) {
        $request = request();
        $data['page_url'] = $request->url();
        $data['loggedin_userid'] = (auth()->guest() ? 0 : auth()->user()->id);
        $data['ip_address'] = $request->getClientIp();
        $data['method'] = $request->method();
        $data['message'] = $exception->getMessage();
        $data['class'] = get_class($exception);

        // The environment is local
        if (App::environment('live') === false) {
            $data['request'] = $request->except('password');
        }

        $data['file'] = $exception->getFile();
        $data['line'] = $exception->getLine();
        $data['trace'] = $exception->getTraceAsString();

        $subject = 'OTC (' . App::environment() . ') ' . ($handler ?
                '' : 'EXCEPTION') . ' Error at ' . date('Y-m-d D H:i:s T');

        Mail::raw(print_r($data, true), function ($message)use ($subject) {
            $message->to(config('errorgroup.error_notification_group'))->subject($subject);
        });
    }

    /**
     * Get exception message application environment
     *
     * @param  Exception $exception
     * @return string
     */
    public static function getExceptionMessage($exception) {
        $exMessage = trans('messages.generic.failure');

        $actualException = 'Error: ' . $exception->getMessage() .
                ' . File: ' . $exception->getFile() . ' . Line#: ' . $exception->getLine();

        if (config('app.debug') === false) {
            self::shootDebugEmail($exception);
            return $exMessage;
        } else {
            return $actualException;
        }
    }

    /**
     * getdetailsByIP
     * @param  $ip
     * @return string
     * @author Meghendra S Yadav
     */
    public static function getdetailsByIP($ip) {
        $key = '77a4b17d7140d7126115c68623448d679b2bc1646f739ddadf4b0b0c0abbc962';
        $url = json_decode(file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=$key&ip=" . $ip . "&format=json"));
        return $url;
    }

    /**
     * getAllSettings
     * @param
     * @return
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public static function getAllSettings() {
        $arrSettingData = App\Models\Admin\SiteSetting\SiteSetting::getAllSettings();
        foreach ($arrSettingData as $settingdata) {
            $arrData[$settingdata->option_name] = $settingdata->option_value;
        }
        return $arrData;
    }

    /**
     * getPageDetailByLocation
     * @param
     * @return
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public static function getPageDetailByLocation($location) {
        $arrPageData = App\Models\Admin\Cms\Page::getPageDetailByLocation($location);
        return $arrPageData;
    }

    /**
     * getAnnouncement
     * @param
     * @return
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public static function getAnnouncement() {
        $arrData = App\Models\Announcement::getActiveAnnouncement();
        return $arrData;
    }

    /**
     * getAnnouncementUser
     * @param
     * @return
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public static function getAnnouncementUser($id) {
        $arrData = App\Models\Announcement::getActiveAnnouncementUser($id);
        return $arrData;
    }

    /**
     * getUserOnlineStatus
     * @param
     * @return
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public static function getUserOnlineStatus($id) {
        $arrData = App\Models\Front\User\Sessions::getUserOnlineStatus($id);
        return $arrData;
    }

    /**
     * get Data for email template
     * @param string , array, array
     * @return array
     * @since 0.1
     * @author Sanjay Yadav
     */
    public static function getEmailTemplateData($template_code, $search, $replace) {
        $arrData['emailData'] = EmailTemplate::getEmailTemplateById($template_code);
        $arrData['content'] = str_replace($search, $replace, $arrData['emailData']->message);
        return $arrData;
    }

    /**
     * getUserFeedback
     * @param from_user_id, trade_request_id
     * @return Feedback Count
     * @since 0.1
     * @author Vikrant
     */
    public static function getUserFeedback($from_user_id, $trade_request_id) {
        $arrData = Feedback::checkFeedback($from_user_id, $trade_request_id);
        return $arrData;
    }

    /**
     * getUserFeedback
     * @param from_user_id, trade_request_id
     * @return Feedback Count
     * @since 0.1
     * @author Vikrat
     */
    public static function getUserLastLog($id) {
        $arrData = ActivityLog::getUserLastLog($id);
        return $arrData;
    }

    /**
     * getOnlyUsername
     * @param $id
     * @return
     * @since 0.1
     * @author Vikrat
     */
    public static function getOnlyUsername($id) {
        $arrData = User::getUserDetailsByID($id);
        return ($arrData) ? $arrData->username : '';
    }

    public static function getUserFullname($id) {
        $arrData = User::getUserDetailsByID($id);
        return ($arrData) ? $arrData->fname.' '.$arrData->lname : '';
    }

    /**
     * getUserRole
     * @param $id
     * @return 
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public static function getUserRole($id) {
        $arrData = User::getUserRoleById($id);
        return $arrData;
    }

    /**
     * get all language 
     * @param void
     * @return array
     * @since 0.1
     * @author  Sanjay Yadav
     */
    public static function getLanguages() {
        $languages = Language::getLanguages();
        return $languages;
    }

    /**
     * getLoginCountryName
     * @param void
     * @return array
     * @since 0.1
     * @author Arvind Soni
     */
    public static function getLoginCountryName($investor_id = '') {
        if ($investor_id == '') {
            $countryName = '';
        } else {
            $countryName = Investor::getLoginCountryName($investor_id)->countryName;
        }
        return $countryName;
    }

    /**
     * getLoginCountryCode
     * @param void
     * @return array
     * @since 0.1
     * @author Arvind Soni
     */
    public static function getLoginCountryCode($investor_id = '') {
        if ($investor_id == '') {
            $countryCode = '';
        } else {
            $countryCode = Investor::getLoginCountryName($investor_id)->countryCode;
        }
        return $countryCode;
    }

    /**
     * getCountryIdByCode
     * @param void
     * @return array
     * @since 0.1
     * @author Arvind Soni
     */
    public static function getCountryIdByCode($country_code = '') {
        if ($country_code == '') {
            $countryId = '';
        } else {
            $countryId = Country::getCountryIdByCode($country_code);
        }
        return $countryId;
    }

    /**
     * getCapchaImage
     * @param void
     * @return array
     * @since 0.1
     * @author Arvind Soni
     */
    public static function getCapchaImage($param = '') {
        return Captcha::src($param); //Captcha::create();
    }
    
    /**
     * Determine if the session and input CSRF tokens match.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function checkCSRFValid($request)
    {
        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');

        if (! $token && $header = $request->header('X-XSRF-TOKEN')) {
            $token = $this->encrypter->decrypt($header);
        }

        return is_string($request->session()->token()) &&
               is_string($token) &&
               hash_equals($request->session()->token(), $token);
    }
    
  

}
