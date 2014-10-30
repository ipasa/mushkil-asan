@extends('layouts.default')

@section('header')
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{ asset('profile-page/css/normalize.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('profile-page/css/demo.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('profile-page/css/set1.css') }}" />
@endsection

@section('content')
<div class="container">
    <header class="codrops-header">
        <h1>Team - Mechanic <span>We deramed, Create & build</span></h1>
    </header>
    <div class="content">
        <div class="grid">
            <figure class="effect-zoe">
                <img src="{{ asset('profile-page/img/pasha.jpg') }}" alt="img26"/>
                <figcaption>
                    <h2 class="fig-caption">Hasan Hafiz</h2>
                    <p class="description">পাগলা কোন কামকাজ নাই, খালি ঘুমায় :P</p>
                </figcaption>
            </figure>
            <figure class="effect-zoe">
                <img src="{{ asset('profile-page/img/26.jpg') }}" alt="img26"/>
                <figcaption>
                    <h2 class="fig-caption">Anwerul Islam</h2>
                    <p class="description">Zoe never had the patience of her sisters. She deliberately punched the bear in his face.</p>
                </figcaption>
            </figure>
            <figure class="effect-zoe">
                <img src="{{ asset('profile-page/img/26.jpg') }}" alt="img26"/>
                <figcaption>
                    <h2 class="fig-caption">Mahadi Hasan</h2>
                    <p class="description">Zoe never had the patience of her sisters. She deliberately punched the bear in his face.</p>
                </figcaption>
            </figure>
        </div>
    </div>
</div><!-- /container -->
<script>
    // For Demo purposes only (show hover effect on mobile devices)
    [].slice.call( document.querySelectorAll('a[href="#"') ).forEach( function(el) {
        el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
    } );
</script>
@endsection