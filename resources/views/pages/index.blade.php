@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/customHome.css')}}">
@endsection
@section('home')
<div id="main">
    <video id="homeVideo" autoplay loop muted onload="video()">
        <source src="{{asset('videos/homeVideo.mp4')}}" type="video/mp4">
    </video>
    <div id="home">
        <h1 id="heading"><i class="fas fa-file-medical"></i> Automed</h1>
        <div id="redirection">
            <p>Create account to hire best servicers</p>
            <a href="/register" class="btn">Create</a>
        </div>
    </div>
</div>

<script>
    function video() {
        document.getElementById('homeVideo').play();
    }
</script>
@endsection
