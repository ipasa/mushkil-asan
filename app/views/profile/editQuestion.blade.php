@extends('layouts.default')

@section('content')
<section class="askquestion-section">
    <div class="container">
        <div class="row colored">
            <div class="contcustom askquestion">
                <h2>Edit the Question</h2>

                @if(Auth::check())
                    <form action="{{ URL::route('update-question') }}" method="PUT">

                        @if($errors->has('questionTitle'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                              </button>
                              {{ $errors->first('questionTitle') }}
                            </div>
                        @endif
                        <input type="text" name="questionTitle" value="{{ $question->questiontitle }}">

                        @if($errors->has('question'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                              </button>
                              {{ $errors->first('question') }}
                            </div>
                        @endif
                        <textarea class="form-control" rows="7" value="Hell" name="question">{{ $question->question }}</textarea>
                        
                        <label class="checkbox">
                            @if($question->solved==0)
                                <input type="checkbox" name="solved" value="1">
                                The Question is not solved
                            @else
                                <input type="checkbox" name="solved" value="0" checked>
                                The Question is Already solved
                            @endif
                        </label>
                        
                        <input name="update_question_id" type="hidden" value="{{ $question->id }}"/>
                        
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