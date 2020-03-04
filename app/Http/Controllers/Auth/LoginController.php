<?php

namespace App\Http\Controllers\Auth;
use Mail;
use Request;
use App\User;
use Auth;
use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\ValidateSecretRequest;
use Google2FA;
use \ParagonIE\ConstantTime\Encoding;
use Twilio\Rest\Client;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $sid    = env('TWILIO_ACCOUNT_SID');
        $token  = env('TWILIO_AUTH_TOKEN');
        $this->from = env('TWILIO_SMS_FROM');
        $this->twilio = new Client($sid, $token);
        $this->user = new User();
    }

     public function login(LoginRequest $request)
    {

        try {

            $data = Request::all();
            $field = filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? 'email'
                    : 'mobile';
            // login code with email and mobile
            $credentials = Request::only($field, 'password');

            $user = $this->user->getUserByColumn($field, $data['email']);
         
            if (!Auth::attempt($credentials)) {

                return Redirect::back()->withErrors(trans('error_message.creadential_not_valid'));
            }

            Auth::logout();
            $redirectTo = $request->get('redirect');
            $request->session()->put('2fa:user:id', $user->id);           
             
            if ($redirectTo == '') {
                return redirect('/2fa/validate');
            } else {
                return redirect(url('/').'/'.$redirectTo);
            }
            
        } catch (Exception $ex) {
            return redirect()->back()->withErrors(Helper::getExceptionMessage($ex));
        }
    }

     public function getValidateToken()
    {
        if (session('2fa:user:id')) {
            return view('2fa/validate',['otp'=> session('2fa:user:id')]);
        }

        return redirect('login');
    }

    public function validateotp()
    {
          if (session('2fa:user:id')) {

            $otp = bin2hex(random_bytes(3));
            session()->put('2fa:user:otp', $otp);
       
            $user = User::find(session('2fa:user:id'));

            $data = array('name'=> @$user->name,'otp'=>$otp);            
            // $text = 'Hi '. $user->name .' , Your One Time Pasword is: '.  $otp;
            
            // $message = $this->twilio->messages
            //       ->create("+12124959980", // to
            //                array(
            //                    "body" => $text,
            //                    "from" => $this->from
            //                )
            //       );

            $mail = Mail::send('mail', $data, function($message) use($user) {           
                $message->to('zeebalakhtar666@gmail.com')->subject
                ('ZP | Auth OTP Notification');
                $message->from('ZP@no-reply.com','ZP');            
            });

            if (Mail::failures()) 
            return view('2fa/validate');
            else
            return view('2fa/validateotp', ['data'=>$data]);   
           // else
            //return view('2fa/validate');
        }

        return redirect('login');
    }
    
    //added by zeebal
    public function postValidateOtpToken(Request $request)
    {    
        $input = $request::all();
        
        $userId = session('2fa:user:id');
        $otp = session('2fa:user:otp');
        $otpInput = $input['mailotp'];

        if (strcmp($otpInput, $otp) == 0)
        {
            $user = User::find($userId);            
        
            if($user->google2fa_secret) {   //if secret exist

                $secret = Crypt::decrypt($user->google2fa_secret);
                                                                
                //generate image for QR barcode
                $imageDataUri = Google2FA::getQRCodeInline(
                    $request::getHttpHost(),
                    $user->email,
                    $secret,
                    200
                );

               
            }
            else //if secret key not exist
                {
                        //generate new secret
                        $randomBytes = random_bytes(10);
                        $secret = Encoding::base32EncodeUpper($randomBytes);                        
                                              
                        //encrypt and then save secret
                        $user->google2fa_secret = Crypt::encrypt($secret);
                        $user->save();
                        
                        //generate image for QR barcode
                        $imageDataUri = Google2FA::getQRCodeInline(
                            $request::getHttpHost(),
                            $user->email,
                            $secret,
                            200
                        );
                 }
            return view('2fa/enableTwoFactor', ['image' => $imageDataUri,
                'secret' => $secret]);
        }
        else
        {    
              return redirect()->back()->with('failure','Not A Valid Token');
        }
    }

    public function postValidateToken(ValidateSecretRequest $request)
    
    {
        //get user id and create cache key
        $userId = $request->session()->pull('2fa:user:id');
        $key    = $userId . ':' . $request->totp;

        //login and redirect user
        Auth::loginUsingId($userId);

        return redirect('/home')->with('status','Login Successfully.');
    }
}
