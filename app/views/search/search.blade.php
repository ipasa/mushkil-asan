@extends('layouts.default')

@section('content')

<!-- For Search Section -->
<section class="search-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 search">
                <div class="col-md-6 col-md-offset-3">
                    <h2><u>Search Question : </u></h2>
                    <form action="{{ URL::route('postSearch') }}" method="post">
                        <input name="search" type="search" placeholder="Search Item"/>
                        {{--<input class="search-button text-center" type="submit" value="Search"/>--}}
                        <button type="submit" class="btn btn-default wide" value="Search">
                            <span class="fa fa-check med"></span>
                        </button>
                        {{ Form::token() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- End of Search Section -->
@endsection