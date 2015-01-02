@extends('layouts.default')

@section('content')
    <section class="askquestion-section">
        <div class="container">
            <div class="row colored">
                <div class="contcustom askquestion">
                    <h2>Update your profile - </h2>

                    @if(Auth::check())
                        <form action="{{ URL::route('main-update-profile') }}" method="PUT">


                            <input type="text" name="fullname" value="{{ $user_info->fullname }}">
                            <input type="text" name="tagline" value="{{ $user_info->tagline }}">

                            <textarea class="description" rows="7" value="Hell" name="description">{{ $user_info->aboutme }}</textarea>


                            <button type="submit" class="btn btn-default wide">
                                <span class="fa fa-check med"></span>
                            </button>

                            {{ Form::token() }}
                        </form>

                    @else
                        <p>Please Login to Update your profile.</p>
                    @endif
                </div>
            </div>
        </div>

    </section><!-- End of section -->
@stop