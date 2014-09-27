@extends('layouts.default')

@section('content')
<section class="askquestion-section">
    <div class="container">
        <div class="row colored">
            <div class="contcustom">
                <h2>Ask a Question</h2>

                @if(Auth::check())
                    <form action="{{ URL::route('ask-question') }}" method="POST">

                        @if($errors->has('question'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                              </button>
                              {{ $errors->first('question') }}
                            </div>
                        @endif

                        <textarea class="form-control" rows="5" name="question"></textarea>

                        <button type="submit" class="btn btn-default wide">
                            <span class="fa fa-check med"></span>
                        </button>

                        {{ Form::token() }}
                    </form>

                @else
                    <p>Please Login to Ask a Question.</p>
                @endif
            </div>
        </div>
    </div>

</section><!-- End of section -->
@stop