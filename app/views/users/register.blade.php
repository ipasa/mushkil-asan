@extends('layouts.default')

@section('content')
<!-- Registration Form Option -->
<section class="loginform-section">
    <!-- IPad Registration - START -->
    <div class="container">
        <div class="row colored">
            <div class="contcustom">
                <h2>Registration Form</h2>
                <form>
                    <input type="text" placeholder="username">
                    <input type="text" placeholder="Full Name">
                    <input type="email" placeholder="E-mail">
                    <input type="password" placeholder="password">
                    <button type="submit" class="btn btn-default wide"><span class="fa fa-check med"></span></button>
                </form>
            </div>
        </div>
    </div>

    <!-- IPad Login - END -->

</section><!-- End of loginform-section -->

@endsection