<?php

namespace App\Http\Controllers;

use Crypt;
use App\User;
use Illuminate\Http\Request;
use ParagonIE\ConstantTime\Base32;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminHome()
    {
        $type = User::getUserType();
        $arr = User::where('user_type', '!=', $type)->get();
        return view('admin.home', ['data' => $arr]);
    }

    /**
     * Show the User dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $type = User::getUserType();
        $page = 'home';

        return view($page);
    }

    public function index()
    {
//        $text = 'The text you are desperate to analyze :)';
//        $path =  base_path('FRBS\FaceRecognitionUI.py');
//        $process = new Process(['python', 'C:\\xampp\\htdocs\\zp\\FRBS\\FaceRecognitionUI.py']);
//        $process->run();
//
//        // executes after the command finishes
//        if (!$process->isSuccessful()) {
//            throw new ProcessFailedException($process);
//        }
//
//        echo $process->getOutput();
        return view('home');
    }

    public function set2FAStatus(Request $request)
    {
        $params = $request->all();
        $result = [];
        $user = User::find($params['userId']);

        if ($params['status'] == 0) { //To Disable 2FA
            if ($user) {
                $user->google2fa_secret = null;
                $user->save();
                $result['success'] = true;
                $result['message'] = '2FA disabled successfully for Username: ' . $user->name;
            }
        } elseif ($params['status'] == 1) { //To Enable 2FA
            if ($user) {
                $randomBytes = random_bytes(10);
                $secret = Base32::encodeUpper($randomBytes);
                $user->google2fa_secret = Crypt::encrypt($secret);
                $user->save();
                $result['success'] = true;
                $result['message'] = '2FA enabled successfully for Username: ' . $user->name;
            }
        } else {
            $result['success'] = false;
            $result['message'] = 'Something went wrong!';
        }

        return response()->json($result);
    }
}
