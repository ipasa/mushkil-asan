@extends('layouts.default')

@section('content')
<!-- Login Form Option -->
<section class="loginform-section">
    <!-- IPad Login - START -->
    <div class="container">
        <div class="row colored">

            @if(Session::has('error-message'))
                <div class="contcustom">
                    <p>{{ Session::get('error-message') }}</p>
                </div>
            @endif

            <div class="contcustom">
                <span>
                    <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                </span>
                <h2>Login Form</h2>
                <form action="{{ URL::route('login') }}" method="POST">

                    <input type="email" name="email" placeholder="Email"{{ Input::old('email')?' value="'.Input::old('email') .'"':'' }} required>
                        @if($errors->has('email'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                              </button>
                              {{ $errors->first('email') }}
                            </div>
                        @endif

                    <input type="password" name="password" placeholder="password" required>
                        @if($errors->has('password'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                              </button>
                              {{ $errors->first('password') }}
                            </div>
                        @endif

                    <p style="float: left">
                        <input type="checkbox" name="remember" id="remember" class="float-left">
                        <label for="remember">Remember Me</label>
                    </p>

                    <p class="text-right">
                        <a href="{{ URL::route('forget-password') }}">Forget your Password ?</a>
                    </p>

                    <button type="submit" class="btn btn-default wide">
                        <span class="fa fa-check med"></span>
                    </button>

                    {{ Form::token() }}
                </form>
            </div>
        </div>
    </div>

    <!-- IPad Login - END -->

</section><!-- End of loginform-section -->

@endsection