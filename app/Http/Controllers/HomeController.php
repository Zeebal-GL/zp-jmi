<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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
}
