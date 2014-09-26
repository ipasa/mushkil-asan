@extends('layouts.default')

@section('content')
<!-- Registration Form Option -->
<section class="loginform-section">
    <!-- IPad Registration - START -->
    <div class="container">
        <div class="row colored">
            <div class="contcustom">
                <h2>Registration Form</h2>
                <form action="{{ URL::route('registration') }}" method="POST">

                    <input type="text" name="username" placeholder="username"{{ Input::old('username')?' value="'.Input::old('username') .'"':'' }} required>
                        @if($errors->has('username'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                              </button>
                              {{ $errors->first('username') }}
                            </div>
                        @endif


                    <input type="text" name="fullname" placeholder="Full Name"{{ Input::old('fullname')?' value="'.Input::old('fullname') .'"':'' }} required>
                        @if($errors->has('fullname'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                              </button>
                              {{ $errors->first('fullname') }}
                            </div>
                        @endif


                    <input type="email" name="email" placeholder="E-mail"{{ Input::old('email')?' value="'.Input::old('email') .'"':'' }} required>
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

                    <button type="submit" class="btn btn-default wide"><span class="fa fa-check med"></span></button>
                    {{ Form::token() }}
                </form>
            </div>
        </div>
    </div>

    <!-- IPad Login - END -->

</section><!-- End of loginform-section -->

@endsection