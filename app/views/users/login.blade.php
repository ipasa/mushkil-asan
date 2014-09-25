@extends('layouts.default')

@section('content')
<!-- Login Form Option -->
<section class="loginform-section">
    <!-- IPad Login - START -->
    <div class="container">
        <div class="row colored">
            <div class="contcustom">
                <span>
                    <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                </span>
                <h2>Login Form</h2>
                <form>
                    <input type="text" placeholder="username">
                    <input type="password" placeholder="password">
                    <button type="submit" class="btn btn-default wide"><span class="fa fa-check med"></span></button>
                </form>
            </div>
        </div>
    </div>

    <!-- IPad Login - END -->

</section><!-- End of loginform-section -->

@endsection