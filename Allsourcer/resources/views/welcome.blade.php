@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="css/coverpage.css">

@endsection
@section('content')

          <div class="wrapper">
            <div class="section section-header">
                <div class="parallax pattern-image">
                    <img src="https://ununsplash.imgix.net/photo-1427434846691-47fc561d1179?fit=crop&fm=jpg&h=700&q=75&w=1050"/>
<!--                     <img src="/assets/img/header6.jpg"/> -->
                    <div class="container">
                        <div class="content">
                            <h1>All Sourcer</h1>
                            <div class="separator-container">
                                <div class="separator line-separator">∎</div>
                            </div>
                            <h5>Awesome way to help others and get help from others accomplish tasks accompanied by stipend</h5>
                        </div>
                    </div>
                </div>
                <a href="" data-scroll="true" data-id="#whoWeAre" class="scroll-arrow hidden-xs hidden-sm">
                <i class="fa fa-angle-down"></i>
                </a>
            </div>


            <!-- other content -->
             <div class="section section-we-are-1" id="whoWeAre">
                <div class="text-area">
                    <div class="container">
                        <div class="row">
                            <div class="title" id="animationTest">
                                <h2>About All sourcer</h2>
                                <div class="separator-container">
                                    <div class="separator line-separator">∎</div>
                                </div>
                                <p class="large">

                                    All Sourcer is a startup product that provides you with tasks accomplishable withnin a a maximum of 3 days provided you have the necessary competence required to do the work. We offer tasks of all domains. We love the web and care deeply for how users interact with a digital product. We power businesses and individuals to create to create task and accomplish tasks. Tasks found on our platform are accomplishable both remotely or onsite.Note that All task in our system expires after 3 days so Each task you take here we assume you will deliver within a period of 3 days 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
          
        

            <footer class="footer footer-color-black">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="{{ url('/home') }}">
                                Home
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                Contact
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                Blog
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                Sponsorships
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="social-area pull-right">
                        <a class="btn btn-social btn-facebook btn-simple" href="https://www.facebook.com/fanyui">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-social btn-twitter btn-simple" href="https://twitter.com/fanyui">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="btn btn-social btn-pinterest btn-simple" href="https://plus.google.com/+fanyui">
                            <i class="fa fa-google-plus-square"></i>
                        </a>
                        <a class="btn btn-social btn-pinterest btn-simple" href="#">
                            <i class="fa fa-dribbble"></i>
                        </a>
                    </div>
                    <div class="copyright">
                        &copy; 2017 <a target="_blank" href="#"> all sourcer</a>
                    </div>
                </div>
            </footer>

          </div>
@endsection
