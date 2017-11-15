@extends('layouts.master')


@section('content')


        <main class="mdl-layout__content">
            <div class="container-fluid">

                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--8-col mdl-cell--12-col-tablet">
                        @if(@session('status'))
                            <h3>{{@session('status')}}</h3>

                        @endif
                        <div class="row"><h6>Recent Task</h6></div>

                        <div class="row">
                            <div id="starter" class="mdl-grid">
                                @if(count($tasks) == 0)
                                <header class = "mdl-layout__header">
                                    <div class = "mdl-layout__header-row">      
                                       <span class = "mdl-layout-title">All Task have Expired Please Come back later</span>          
                                    </div>       
                                </header>
                                @endif

                                @foreach ($tasks as $task )
                                    
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                                        <div class="mdl-card mdl-shadow--4dp">
                                            <div class="mdl-card__title">
                                                <h2 class="mdl-card__title-text">{{$task->title}}</h2>
                                            </div>
                                            <div class="mdl-card__supporting-text">

                                                {{ substr($task->description, 0, 40) }}<br>
                                                {{ substr($task->description, 41, 80) }}

                                            </div>
                                            <div class="mdl-card__actions">
                                                
                                                    <a href="/taskView/{{$task->id}}">
                                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                                            View Task
                                                        </button>
                                                    </a>
                                                    
                                            </div>

                                        
                                            <div class="mdl-card__menu">
                                            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                              <i class="material-icons">share</i>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach

                            </div>
                        </div>
                    </div>


                    <div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet">
                        <div class="row"><h6>Top Unclaimed Task</h6></div>
                            <div class="row">
                                <div style="" class="mdl-grid">
                                    
                                     @for($i=0;$i<2;$i++)
                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet">
                                            <div class="mdl-card mdl-shadow--4dp">
                                                <div class="mdl-card__title">
                                                    <h2 class="mdl-card__title-text">Type of Task</h2>
                                                </div>
                                                <div class="mdl-card__supporting-text">
                                                    A short but well detailed introduction into what this task actually is all about.
                                                </div>
                                                <div class="mdl-card__actions">
                                                    <button onclick="viewtask()" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                                        View Task
                                                    </button>
                                                </div>

                                                <!-- coming soon -->
                                                <!--<div class="mdl-card__menu">
                                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                                  <i class="material-icons">share</i>
                                                </button>
                                                </div> -->
                                            </div>
                                        </div>
                                    @endfor

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

    <script>

        function viewtask() {
            window.location.replace("pages/index.html");
        } 
        
    </script>
@endsection