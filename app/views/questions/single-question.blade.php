@extends('layouts.default')

@section('content')
<!-- For Question Section -->
<section class="question-section">
    <div class="container single-question singlepage-single-question">
        <div class="row">
            <div class="col-md-1 answer">
                <h2>{{ count($singleQuestion->answers) }}</h2>
                <p>{{ Str::plural("Answer", count($singleQuestion->answers) )}}</p>
            </div><!-- End of answer -->

            <div class="col-md-1 vote">
                <h2>0</h2>
                <p>Votes</p>
            </div><!-- End of vote -->
            <div class="col-md-1 view">
                <h2>5</h2>
                <p>Views</p>
            </div><!-- End of views -->

            <div class="col-md-9 question">

                <h2>{{ $singleQuestion->questiontitle }}</h2>
                <h5>this question asked by - {{ HTML::linkRoute('profile-user', ucfirst($singleQuestion->user->username), $singleQuestion->user->username) }}</h5>
                <h6 style="margin-bottom: 20px">Asking date - {{ date("d F Y",strtotime($singleQuestion->created_at)) }}, last edit date - {{ date("d F Y",strtotime($singleQuestion->updated_at)) }}</h6>
                <hr>

                <p>{{ $singleQuestion->question }}</p>

                {{--Responsible for Edit a Question--}}
                {{--<div class="row">
                  <div class="col-md-2">
                    <p class="myLeft">
                      <button type="button" class="btn btn-primary btn-xs">View</button>
                      <button type="button" class="btn btn-default btn-xs">Edit</button>
                    </p>
                  </div>
                </div>--}}
            </div><!-- End of question -->

            {{--Display the answers--}}
            <div class="col-md-11 col-md-offset-1">
                <hr/>
                <h3>Answers of this queston:</h3>
                @if($singleQuestion->answers->isEmpty())
                    <p>This Question has no answer yet!</p>
                @else
                    @foreach($singleQuestion->answers as $answer)
                        <div class="col-md-11 answer-section">
                            <h5>
                                Answered By -
                                {{ HTML::linkRoute('profile-user', ucfirst($answer->user->username), $answer->user->username) }}
                                <span style="float: right">Answered At - {{ date("d F Y",strtotime($answer->created_at)) }}</span>
                            </h5>

                            <p class="text-left">{{ $answer->answer }}</p>
                        </div>
                    @endforeach

                @endif
            </div>


            {{--Post a Answer Section--}}
            <div class="col-md-9 col-md-offset-3">
                <hr/>
                <h2>Answer this question:</h2>

                @if(!Auth::check())
                    <h4>Please login to Answer this question</h4>
                @else
                    <form action="{{ URL::route('answer') }}" method="POST">
                        @if($errors->has('answer'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                              <span aria-hidden="true">&times;</span>
                              <span class="sr-only">Close</span>
                            </button>
                            {{ $errors->first('answer') }}
                            </div>
                        @endif
                        <input type="text" name="answer" placeholder="Answer this question"/>
                        <input type="hidden" name="question_id" value="{{ $singleQuestion->id }}"/>
                        <button type="submit" class="btn btn-mini btn-primary text-center">
                            <span class="fa fa-check med"> Submit your Answer</span>
                        </button>
                        {{ Form::token() }}
                    </form>
                @endif
            </div>{{--End of post answer section--}}

        </div>
    </div><!-- container -->
</section><!-- End of Question Section -->
@endsection
