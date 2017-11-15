<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Mail;
use App\Task;
use App\Taskclaim;
use App\User;
use App\Taskcreator;
use App\Comment;
use App\Filter;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Photo;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Mail\AcceptanceNotif;



class TaskController extends Controller
{
   public function __construct(){
   	$this->middleware('auth');
   }

   public function createTask(Request $request){
   		 $filters = Filter::get();
      return view('task.create', ['filters' => $filters]);
   }
   public function delete(){

   }
   //save the specific task created by the currently loged in user
   public function saveTask(Request $request){


        $this->validate($request, [
            'title' => 'required|max:255',
            'price' => 'required|max:255',
            'filter_id' => 'required|max:255',
            'description' => 'required|max:510',

        ]);

   	$request->user()->taskcreate()->create([
   		'title' => $request->title,
   		'description' => $request->description,
   		'filter_id' => $request->filter_id,
   		'price' => $request->price,
         'duration'=> $request->duration,
         'work_location' => $request->work_location,
         'status' => $request->status,

   	]);
   	return 

      redirect('/home');
   }
   //claims a particular task chosen by the user

   public function claimTask($task,  $commenter){

      $taskclaim = new Taskclaim();
      $taskclaim->user_id = $commenter;
      $taskclaim->task_id = $task;
      $taskclaim->save();
      //change the status of the task to inprogress
      $taskStatus = Task::find($task);
      $taskStatus->status='Inprogress';
      $taskStatus->save();

      $user = User::find($commenter);

   	// Auth::user()->taskClaimed()->create([
   	// 	'user_id' =>$commenter,
   	// 	'task_id' =>$task,
       /*Send Email*/ 
        $mailContent = [   'title' => 'Tasc Confirmation', 
                            'body' =>   '<strong>'.$user->name.'</strong> you have been accepted by<br />' .
                                        '<strong>'.Auth::user()->name.'</strong> to work on the task <br />' .
                                        '<strong>'.$taskStatus->title.' </strong> you can get to him on phone or email through<br />' .
                                        '<strong>'.Auth::user()->email.' </strong> or phone <br />' .
                                        '<strong>'.Auth::user()->phone.' </strong><br />',
                            'url' => config('app.url'),
                        ];

        // $when = Carbon::now()->addMinutes(1);

        Mail::to(config('settings.system.email'))->queue(new AcceptanceNotif($mailContent));

   return  redirect('/home')->with('status', 'you have accepted '.$user->name.' To work on you task');
   }

   public function  index(){
   		

   }

   public function viewTask($id){
      $task = Task::findOrFail($id);

      return view('task.taskDetails',['task'=>$task]);
   }

   public function comment($taskid){
       $task = Task::findOrFail($taskid);

       $taskcreator = DB::table('taskcreators')->where('task_id',$taskid)->first();
       $comments = Comment::where('task_id',$taskid)->get();
       //return $taskcreator->user_id;

       //$comments = DB::table('comments')->where('task_id',$taskid)->get();
      return view('task.comment',['task'=>$task,'comments'=>$comments,'taskcreator'=>$taskcreator]);
   }

   public function saveComment(Request $request, $task){
      $comment = new Comment();
      $comment->comment = $request->comment;
      $comment->user_id = Auth::user()->id;
      $comment->task_id = $task;
      $comment->save();

      return back();
   }



   public function sitemap(){

       $sitemap = App::make("sitemap");

    
    // by default cache is disabled

    //allow the application to  cache for over 60 minutes
    $sitemap->setCache('laravel.sitemap', 60);
    
    // check if there is cached sitemap and build new only if it is not
    if (!$sitemap->isCached())
    {
         // add item to the sitemap (url, date, priority, freq)
         $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
         $sitemap->add(URL::to('profile'), '2012-08-26T12:30:00+02:00', '0.9', 'weekly');
         $sitemap->add(URL::to('register'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
         $sitemap->add(URL::to('login'), '2012-08-26T12:30:00+02:00', '0.9', 'weekly');
         $sitemap->add(URL::to('logout'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
         $sitemap->add(URL::to('home'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
         $sitemap->add(URL::to('sitemap.xml'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');
         $sitemap->add(URL::to('createTask'), '2012-08-26T12:30:00+02:00', '0.9', 'daily');



        

        
    }

    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');
    }
}
