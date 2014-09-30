@extends('layouts.default')

@section('content')
<!-- For Question Section -->
<section class="question-section">
    <div class="container single-question singlepage-single-question">
        <div class="row">
            <div class="col-md-1 answer">
                <h2>0</h2>
                <p>Answers</p>
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
        </div>
    </div><!-- container -->
</section><!-- End of Question Section -->
@endsection
