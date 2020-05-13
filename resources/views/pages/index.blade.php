@extends('layouts.app')

@section('content')
<video autoplay>
    <source src="{{asset('videos/home.mp4')}}" type="video/mp4">
    Your browser does not support the video tag.
</video>
@endsection
