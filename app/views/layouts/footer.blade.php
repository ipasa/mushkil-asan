<!-- Footer Option -->
<footer class="container footer">
    <div class="row profileRow">
        <div class="col-md-9">
            <h1>&copy;Mushkil Asan</h1>
            <hr class="customHR">
        </div>

        <div class="col-md-3 mySocialPosition">
            <div class="mySocial">
                <span class="glyphicon fa fa-facebook footer-icon"></span>
                <span class="glyphicon fa fa-twitter footer-icon"></span>
            </div>

            <div class="footer-menu text-right">
                <h6><a href="{{ URL::route('about-us') }}">About Us</a> | </h6>
                <h6><a href="{{ URL::route('rules') }}">Rules</a></h6>
                {{--<h6><a href="{{ URL::route('creator') }}">Creator</a></h6>--}}
            </div>
        </div>
    </div><!-- End of Footer -->
</footer><!-- End of footer -->