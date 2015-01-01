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
                    <h2>Password Recovery Form</h2>
                    <form action="{{ URL::route('forget-password') }}" method="POST">

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