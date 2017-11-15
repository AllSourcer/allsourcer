<?php

namespace App\Http\Controllers;
use DB;
use App\Task;
use App\Taskclaim;
use App\Taskcreator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Photo;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;


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
    public function index(){
        //search engine optimization 
        $tasks = Task::where('status','Pending')->get();
        //for now we get all the task
        //$tasks = Task::get();
        $pendingTasks = Task::where('status','Pending')->get();
        $completedTasks = Task::where('status','Completed')->get();
        $expiredTasks = Task::where('status','expired')->get();

        return view('home',['tasks'=>$tasks,'pendingTasks'=>$pendingTasks,'completedTasks'=>$completedTasks,'expiredTasks'=> $expiredTasks]);
       // return view('home',['tasks'=>$tasks]);
    }

    public function profile(){
        return view('profileUpdate');
    }

     public function update(Request $request)
    {
      $destinationPath = 'profilephotos/photos/';

    $blob = $request->croppedImage;     
    //$img->img = $request->gabbage;
    //$img->email = $request->email;

    //decode the sumitted image string 
    $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $blob));
      
      //give a name to the decoded image
        $fileName = Auth::user()->name.time().".png";
        //save the image at location 'images/uploads/imageName'
        $file = file_put_contents($destinationPath.$fileName, $file);

        //create a new copy of the uploaded image and then changes the dimension 50x50 using the intervention package and save it inthe images/avater directory

        File::copy($destinationPath.$fileName , 'profilephotos/avatar/'.$fileName);
        $resizedImage = Photo::make('profilephotos/avatar/'.$fileName)->resize(150, 150);
        $resizedImage->save();
        

         //save the remaining properties to the database
       //$img->save();
        
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['photo' => $destinationPath.$fileName]);

    }
}
