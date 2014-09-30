@extends('layouts.default')

@section('content')
<section class="question-section">
    @if($allQuestions->isEmpty())
        <p>No Questions</p>
    @else

        <h2>{{ ucfirst(Auth::user()->username) }}'s all Questions : </h2>
        @foreach ($allQuestions as $allQuestion)

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
                    <h2>{{ HTML::linkRoute('single-question', $allQuestion->questiontitle, $allQuestion->id ) }}</h2>
                    <p>{{ Str::limit($allQuestion->question, 200, ' ( Read More... )') }}</p>
                    <div class="row">
                      <div class="col-md-2">
                        <p class="myLeft">
                          <button type="button" class="btn btn-primary btn-xs viewQuestion">{{ HTML::linkRoute('single-question', 'View', $allQuestion->id ) }}</button>
                          <button type="button" class="btn btn-default btn-xs">Edit</button>
                        </p>
                      </div>
                    </div>
                </div><!-- End of question -->
              </div>{{--End of row--}}
            </div><!-- single-question container -->

        @endforeach

            <div class="pagination-style text-center">
                {{ $allQuestions->links() }}
            </div>

        @endif


</section><!-- End of Question Section -->
@endsection