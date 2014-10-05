@extends('layouts.default')

@section('content')

<!-- For Question Section -->
<section class="question-section">
    <h2>Search Results : </h2>
    @if($questions->isEmpty())
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <p>No Questions found</p>
                </div>
            </div>
        </div>
    @else
        @foreach ($questions as $question)

            <div class="container single-question">
              <div class="row">
                <div class="col-md-1 answer">
                    <h2>{{ count($question->answers) }}</h2>
                    <p>{{ Str::plural("Answer", count($question->answers) )}}</p>
                </div><!-- End of answer -->
                <div class="col-md-1 vote">
                    <h2>{{ Vote::countVote($question->id) }}</h2>
                    <p>Votes</p>
                </div><!-- End of vote -->
                <div class="col-md-1 view">
                    <h2>{{ $question->numsofview }}</h2>
                    <p>{{ Str::plural("View", ($question->numsofview)) }}</p>
                </div><!-- End of views -->

                <div class="col-md-9 question">
                    <h2>{{ HTML::linkRoute('single-question', $question->questiontitle, $question->id ) }}</h2>
                    <p>{{ Str::limit($question->question, 200, ' ( Read More... )') }}</p>
                    <p class="myRight">
                        Asked by - {{ HTML::linkRoute('profile-user', ucfirst($question->user->username), $question->user->username) }}
                    </p>
                </div><!-- End of question -->
              </div>{{--End of row--}}
            </div><!-- single-question container -->

        @endforeach
            <div class="pagination-style text-center">
                {{ $questions->links() }}
            </div>

        @endif


</section><!-- End of Question Section -->
@endsection