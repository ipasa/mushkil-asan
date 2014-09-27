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
                <h2>Password Changing Form</h2>
                <form action="{{ URL::route('change-password') }}" method="POST">

                    <input type="password" name="old-password" placeholder="Old Password" required>
                        @if($errors->has('old-password'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                              </button>
                              {{ $errors->first('old-password') }}
                            </div>
                        @endif

                    <input type="password" name="new-password" placeholder="New Password" required>
                        @if($errors->has('new-password'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                              </button>
                              {{ $errors->first('new-password') }}
                            </div>
                        @endif

                    <input type="password" name="new-password-again" placeholder="New Password Again" required>
                        @if($errors->has('new-password-again'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                              </button>
                              {{ $errors->first('new-password-again') }}
                            </div>
                        @endif

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