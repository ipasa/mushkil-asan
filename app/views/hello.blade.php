@extends('layouts.default')

@section('content')

<!-- For Question Section -->
<section class="question-section">
    <h2>Unsolved Questions : </h2>
    @if(!$questions)
        <p>No Questions</p>
    @else
        @foreach ($questions as $question)

            <div class="container single-question">
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