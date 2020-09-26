<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Rekognition\RekognitionClient;
use Twilio\Rest\Client;
use App\User;

class PhotosController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $sid = env('TWILIO_ACCOUNT_SID');
        // $token = env('TWILIO_AUTH_TOKEN');
        // $this->from = env('TWILIO_SMS_FROM');
        // $this->twilio = new Client($sid, $token);
        $this->user = new User();
    }

    public function showForm()
    {
        return view('face-login');
    }
    
    public function submitForm(Request $request)
    {

       // echo '<pre>'; print_r($request->email); die;
        $args = [
            'credentials' => [
                'key' => 'AKIA4D4DD6JYFN55Q72W',
                'secret' => '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',
            ],
            'version' => 'latest',
            'region' => 'us-east-2'
        ];
        
       // move_uploaded_file($file_tmp,"images/".$_POST['email'].'.jpg');

        // $image = fopen($request->file('photo')->getPathName(), 'r');
        // $bytes = fread($image, $request->file('photo')->getSize());
       //$path = $request->file('photo')->store('users');
       // echo $path;

       $client = new RekognitionClient($args);

        $compareFaceResults = $client->compareFaces([
            'SimilarityThreshold' => 80,
            'SourceImage' => [
                'Bytes' => file_get_contents(asset("users/admin@yopmail.com.jpg")),
            ],
            'TargetImage' => [
                'Bytes' => file_get_contents(asset("avatars/p2.jpg")),
            ],
        ]);


        $FaceMatchesResult = $compareFaceResults['FaceMatches'];
        $FaceUnMatchesResult = $compareFaceResults['UnmatchedFaces'];
        // $SimilarityResult =  $FaceMatchesResult['Similarity']; //Here You will get similarity
        $sourceImageFace = $compareFaceResults['SourceImageFace'];
        $sourceConfidence = $sourceImageFace['Confidence']; // //Here You will get confidence of the picture

        echo '<pre>'; print_r($FaceMatchesResult);
        echo 'No. of faces detect:'. count($FaceMatchesResult);
        echo '<pre>'; print_r($sourceImageFace);
        echo '<pre>'; print_r($sourceConfidence);
        echo '<pre>'; print_r($compareFaceResults);     
    
        
       // return view('face-login');
      //  request()->session()->flash('success', $message);
    
        //return view('face-login', ['results' => $results]);


        //logic code here
        if((count($FaceMatchesResult) == 1) && (count($FaceUnMatchesResult) == 0)) {    //single face image only
            $SimilarityResult =  $FaceMatchesResult[0]['Similarity'];

            if($SimilarityResult > 80) {    //If face prediction is 80% or higher
                $user = $this->user->getUserByColumn('email', $request->email);
                $request->session()->put('2fa:user:id', $user->id);
                return redirect('/2fa/validate')->with('login_for', $user->name);;
            }
        }        
    }
}
