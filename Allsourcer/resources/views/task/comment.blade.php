@extends('layouts.master')

@section('content')
 <main class = "mdl-layout__content">  
<div>
	<h2>{{$task->title}}</h2>
	<p>{{$task->description}}</p>
</div>
 <div class = "mdl-grid">
	@foreach($comments as $comment)


	              <div class = "wide-card mdl-card mdl-shadow--2dp">
                  <div class = "mdl-card__title">
                     <h2 class = "mdl-card__title-text">user id :{{$comment->user_id}}</h2>
                  </div>
               
                  <div class = "mdl-card__supporting-text">
                     {{$comment->comment}}
                  </div>
               
                  <div class = "mdl-card__actions mdl-card--border">
                  		@if($taskcreator->user_id == Auth::user()->id)
	             	 <a href="/taskclaimed/{{$task->id}}/{{$comment->user_id}}" ass = "mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Accept User</a>
	             	 @endif
                     <a class = "mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                       reply</a>
                  </div>
               
                  <div class = "mdl-card__menu">
                     <button class = "mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                     <i class = "material-icons">share</i></button>
                  </div>
               </div>
               <br>
	 @endforeach
</div>
<div class="row">
<form method="post" action="/comment/{{$task->id}}">
	{{ csrf_field() }}
                  <div class = "mdl-textfield mdl-js-textfield">
                  	
                     <textarea class = "mdl-textfield__input" type = "text" name="comment" rows =  "3" 
                        id = "text7" ></textarea>
                     <label class = "mdl-textfield__label" for = "text7"><i class="material-icons">textsms</i></label>
                  </div>
                  <button  type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Send!</button>
               </form>



    
  </div>              

</main>
 @endsection 