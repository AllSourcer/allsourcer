@extends('layouts.master')


@section('content')
<div class="demo-ribbon"></div>
      <main class="demo-main mdl-layout__content">
        <div class="demo-container mdl-grid">
          <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
          <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
            <div class="demo-crumbs mdl-color-text--grey-500">
              uploaded on &nbsp :  {{$task->created_at}} <h2>Price     {{$task->price}}</h2>
              <hr>created :{{ $task->created_at->diffForHumans() }} and expires in {{$task->duration}}hrs
            </div>
            <h3> {{$task->title}}</h3>
              <p>
              {{$task->description}}
                </p>
                
             <a href="/comment/{{$task->id}}"> <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Comment...</button></a>

             <hr>
                      <!-- Properties social share -->
         <div class="aa-properties-social">
           <div class="panel panel-default">
             <div class="panel-heading"> 
              <h2>Share</h2>
             </div>
             <div class="panel-body">
               <ul>
                 <li class="share facebook">
                  <a onclick="window.open(
                    'https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('task.view', ['id' => $task->id])) }}', 'newwindow', 'width=600,height=400'); return false;" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('task.view', ['id' => $task->id])) }}"><i class="fa fa-facebook"></i></a>
                 </li>
                 <li class="share twitter"><a  onclick="window.open('https://twitter.com/intent/tweet?url={{ urlencode(route('task.view', ['id' => $task->id])) }}&text=Heyy, checkout+this+new+task&hashtags=a,{{ $task->title }}&via=allsourcer', 'newwindow', 'width=600,height=400'); return false;"  href="https://twitter.com/intent/tweet?url={{ urlencode(route('task.view', ['id' => $task->id])) }}&text=Heyy, checkout+this+new+task&hashtags=allsourcer,{{ $task->title }}&via=allsourcer" target="_blank"><i class="fa fa-twitter"></i></a>
                 </li>
                 <li class="share google-plus">
                  <a onclick="window.open('https://plus.google.com/share?url={{ urlencode(route('task.view', ['id' => $task->id])) }}', 'newwindow', 'width=600,height=400'); return false;" href="https://plus.google.com/share?url={{ urlencode(route('task.view', ['id' => $task->id])) }}" target="_blank"><i class="fa fa-google-plus"></i></a>
                 </li>
                 <li class="share whatsapp"><a href="whatsapp://send?text=Heyyy, checkout this task to be completed within a period of {{ $task->duration }} for on allsourcer renter urlencode(route('task.view', ['id' => $task->id])) }}"><i class="fa fa-whatsapp"></i> </a></li>
               </ul>
              </div>
           </div>
         </div>

          </div>

        </div>
        
        
      </main>
      <footer class="demo-footer mdl-mini-footer">
          <div class="mdl-mini-footer--left-section">
            <ul class="mdl-mini-footer--link-list">
              <li><a href="#">Help</a></li>
              <li><a href="#">Privacy and Terms</a></li>
              <li><a href="#">User Agreement</a></li>
            </ul>
          </div>
        </footer>
    <a href="https://github.com/google/material-design-lite/blob/mdl-1.x/templates/article/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">View Counter</a>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
@endsection