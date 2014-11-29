@extends('layouts.default')

@section('content')
<!-- For Question Section -->
<section class="question-section">
    <div class="container single-question singlepage-single-question">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-4 answer">
                        <h2>{{ count($singleQuestion->answers) }}</h2>
                        <p>{{ Str::plural("Answer", count($singleQuestion->answers) )}}</p>
                    </div><!-- End of answer -->

                    <div class="col-md-4 vote">
                        <h2>{{ Vote::countVote($singleQuestion->id) }}</h2>
                        <p>Votes</p>
                    </div><!-- End of vote -->

                    <div class="col-md-4 view">
                        <h2>{{ $singleQuestion->numsofview }}</h2>
                        <p>{{ Str::plural("View", ($singleQuestion->numsofview)) }}</p>
                    </div><!-- End of views -->
                </div>

                {{--Vote Section--}}
                @if(!Auth::check())
                    <div class="row">
                        <div class="col-md-12 answer">
                            <p>Sorry, you donot have any authorization to vote this question. To vote this question, Pls login</p>
                        </div>
                    </div>
                @elseif(Auth::user()->points<15)
                    <div class="row">
                        <div class="col-md-12 answer">
                            <p>Sorry, Not Have Enough points to vote this Question. To get sufficien points - go to this page: link</p>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-4 answer">
                            <h2><a href="{{ URL::route('vote-question', $singleQuestion->id) }}"><span class="glyphicon glyphicon-thumbs-up"></span></a></h2>
                            {{--<h2>{{ HTML::linkRoute('vote-question', '<span class="glyphicon glyphicon-thumbs-up"></span>', $singleQuestion->id) }}</h2>--}}
                            <p>Vote Up</p>
                        </div><!-- End of answer -->

                        <div class="col-md-4 col-md-offset-4 view">
                            <h2><a href="{{ URL::route('vote-down-question', $singleQuestion->id) }}"><span class="glyphicon glyphicon-thumbs-down"></span></a></h2>
                            {{--<h2>{{ HTML::linkRoute('vote-down-question', '^', $singleQuestion->id) }}</h2>--}}
                            <p>Down</p>
                        </div><!-- End of views -->
                    </div>
                @endif

                </div>

            <div class="col-md-9 question">

                <h2>{{ $singleQuestion->questiontitle }}</h2>
                <h5>this question asked by - {{ HTML::linkRoute('profile-user', ucfirst($singleQuestion->user->username), $singleQuestion->user->username) }}</h5>
                <h6 style="margin-bottom: 20px">Asking date - {{ date("d F Y",strtotime($singleQuestion->created_at)) }}, last edit date - {{ date("d F Y",strtotime($singleQuestion->updated_at)) }}</h6>
                <hr>

                <p class="questiondesc">{{ $singleQuestion->question }}</p>

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
