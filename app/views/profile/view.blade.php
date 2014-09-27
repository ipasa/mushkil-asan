@extends('layouts.default')

@section('content')
    <section class="profile-section">
            <div class="container">
                <div class="row profileRow">
                    <div class="col-md-12 cover-photo alpha-50">
                        <img src="{{ asset('assets/cover-photo/photo-1.jpg') }}" class="img-responsive" alt="Pasha">
                        <div class="myName">
                            <p>
                                {{ $singleuser->fullname }}<br>PHP Lover
                            </p>
                        </div>
                    </div>
                </div><!-- Cover Photo -->

                <div class="row profileRow">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-lg-8 name-tag profileRowHeight">
                                <h3 style="text-transform: capitalize">{{ $singleuser->username }}'s Personal Information:</h3>
                                <p>Name : {{ $singleuser->fullname }}</p>
                                <p>Email : {{ $singleuser->email }}</p>
                                <p>Phone : 8801737104224</p>
                            </div>
                            <div class="col-lg-4 profile-photo profileRowHeight">
                                <img src="{{ asset('assets/profile-photo/photo-1.jpg') }}" class="img-responsive" alt="Pasha">
                            </div>
                        </div>

                        <div class="row profileRating">
                            <div class="col-lg-4 rating ratingRowHeight">
                                <h1>5</h1>
                                <p>Answer</p>
                                <hr>
                                <h1>129</h1>
                                <p>Answer</p>
                                <hr>
                                <h1>22</h1>
                                <p>Answer</p>
                                <hr>
                            </div>

                            <div class="col-lg-8 rating-additional ratingRowHeight">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum velit, quia ad, esse temporibus, placeat repellendus labore laboriosam illum fuga molestiae, delectus! Odit pariatur fugiat necessitatibus, voluptatibus tempore quia numquam!</p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum velit, quia ad, esse temporibus, placeat repellendus labore laboriosam illum fuga molestiae, delectus! Odit pariatur fugiat necessitatibus, voluptatibus tempore quia numquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum velit, quia ad, esse temporibus, placeat repellendus labore laboriosam illum fuga molestiae, delectus! Odit pariatur fugiat necessitatibus, voluptatibus tempore quia numquam!</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12 info-1">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, atque corrupti similique recusandae nihil. Voluptate modi laborum, hic a ut repellendus aliquid in voluptatem perspiciatis, fuga reiciendis rerum facilis necessitatibus?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, atque corrupti similique recusandae nihil. Voluptate modi laborum, hic a ut repellendus aliquid in voluptatem perspiciatis, fuga reiciendis rerum facilis necessitatibus?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, atque corrupti similique recusandae nihil. Voluptate modi laborum, hic a ut repellendus aliquid in voluptatem perspiciatis, fuga reiciendis rerum facilis necessitatibus?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, atque corrupti similique recusandae nihil. Voluptate modi laborum, hic a ut repellendus aliquid in voluptatem perspiciatis, fuga reiciendis rerum facilis necessitatibus?</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 info-2">
                                <h2>Social Profile - </h2>
                                <ul>
                                    <li><b>Facebook</b>:Set Your ID.</li>
                                    <li><b>Twitter</b>:Set Your ID.</li>
                                    <li><b>Instagram</b>:Set Your ID.</li>
                                    <li><b>Github</b>:Set Your ID.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- your Detail's -->
            </div><!-- End of container -->
    </section><!-- End of profile-section -->
@stop
