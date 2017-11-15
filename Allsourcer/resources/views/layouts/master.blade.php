<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- start of material design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="copyright" content="Allsourcer is a registered trademark for Cameroon's based company incharge of providing tasks(jobs) accompishment">
    <meta name="description" content="Allsourcer  is a software that helps provide a means for individuals as well as companies accomplish task within time limit by obtaining a help from another expert in the domain concerned.">
    <meta name="keywords" content="online jobs, help accomplish task,freelance,earn money online, work online,fast accomplish overdue task">
    <meta name="DC.title" content="work online,Easy accomplish task">

    <title>Allsourcer</title>
    <link rel="alternate" href="http://allsourcer.com" hreflang="en" />

    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <!-- end of material design -->

    <title>Project Alpha</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

  

   <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-red.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
</head>
<body>
    <div class="demo-layout-waterfall mdl-layout mdl-js-layout">

        <header class="mdl-layout__header mdl-layout__header--waterfall">
            <!-- Top row, always visible -->
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title"><a class="mdl-navigation__link" href="{{ url('/') }}">Project Alpha</a></span>
                <div class="mdl-layout-spacer"></div>


                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                mdl-textfield--floating-label mdl-textfield--align-right">
                    <label class="mdl-button mdl-js-button mdl-button--icon"
                    for="waterfall-exp">
                    <i class="material-icons">search</i>
                    </label>

                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input" type="text" name="sample"
                        id="waterfall-exp">
                    </div>
                </div>
            </div>
        <!-- Bottom row, not visible on scroll -->
        </header>                                                                          
        
        <div class="mdl-layout__drawer">
            {{ Auth::user()->name }}
                <div class="demo-card-image mdl-card mdl-shadow--4dp">
                        <div class="mdl-card__title mdl-card--expand"><img src="" height = 200px width=200px></div>
            

            </div>

            <span class="mdl-layout-title"><a class="mdl-navigation__link" href="{{ url('/') }}">Project Alpha</a></span>

            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="{{url('/profileUpdate') }}">Update Profile</a>
                <a class="mdl-navigation__link" href="{{ url('/home') }}">Home</a>
                <a class="mdl-navigation__link" href="{{ url('/createTask') }}">Create Task</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="{{ url('/logout') }}""  onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>Logout</a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
            </nav>
        </div>
    

    @yield('content')

</div>
@yield('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>