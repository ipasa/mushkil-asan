@extends('layouts.default')

@section('content')
                <div class="container single-question">
                    <div class="row">
                        <div class="col-md-12 answer">
                            <h3 class="text-left"><u>Rules</u> - </h3>
                            <ul>
                                <li>Everyone can see posts.</li>
                                <li>Everyone can search for problems.</li>
                                <li>Only registered members can post, vote up or vote down.</li>
                                <li>Only registered members can ask and answer any question.</li>
                            </ul>
                            <br/>

                            <h3><u>Point System</u> - </h3>
                            <b>One can earn/lose points by vote up, vote down, ask question and answer any question</b>
                            <ul>
                                <li>Each registered member gets 3 point by default.</li>
                                <li>One can earn 3 points by asking a question.</li>
                                <li>3 points for answering a question.</li>
                                <li>2 points for voting up and 3 point for whose post/ask/answer is voted up.</li>
                                <li>-2 Points lose for whose post/answer is voted down and -1 points who votes down.</li>
                            </ul>
                            <br/>
                        </div><!-- End of answer -->
                    </div>{{--End of row--}}
                </div><!-- single-question container -->
@endsection

