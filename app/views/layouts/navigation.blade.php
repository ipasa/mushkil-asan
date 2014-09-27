<!-- For Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('home') }}"><b>মুশকিল আসান</b></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">
                <li><a href="{{ URL::route('home') }}">Home</a></li>
                <li><a href="yourallquestion.html">Your Q's</a></li>
            </ul>
            @if(Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="profile-name">
                        <a href="#">
                            <img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=20" class="img-circle" alt="Responsive image">
                            {{ Auth::user()->username }}
                        </a>
                    </li>
                    <li><a href="{{ URL::route('change-password') }}">Change Password</a>
                    <li><a href="{{ URL::route('logout') }}">Logout</a></li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Action</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::route('login') }}">Login</a></li>
                            <li><a href="{{ URL::route('registration') }}">Sign Up</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>
            @endif


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav><!-- End of Navigation -->

{{--for Error Showing--}}
@if(Session::has('global'))
    <section>
        <div class="container">
            <div class="row error-section">
                <p>{{ Session::get('global') }}</p>
            </div>
        </div>
    </section>
@endif