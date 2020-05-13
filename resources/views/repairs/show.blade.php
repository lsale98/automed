@extends('layouts.app')


@section('content')
@php
session_start();

$_SESSION['car_id'] = $car->id;
@endphp
<a href="/dashboard" class="btn btn-secondary mb-2">Go Back</a>
<h2 class="mt-2">Car Info</h2>
<div class="row">
    <div class="mt-4 col-md-9 col-sm-12">
        <div class="card">
            <div class="card-header">{{$car->brand}} {{ $car->car_model }}</div>
            <div class="card-body">
                <p>Engine Capacity: {{ $car->engine_capacity }} cm3</p>
                <p>Horse Power: {{ $car->horse_power }} hp</p>
                <p>Car Body: <span class="text-capitalize">{{ $car->car_body }}</span></p>
                <p>Repairs:</p>
                @if(count($repairs)> 0)
                <ul class="list-group">
                    @foreach($repairs as $repair)
                    <li class="list-group-item">{{$repair->repair_title}}</li>
                    @endforeach
                </ul>
                @else

                @endif
            </div>
        </div>
    </div>
    <div class="mt-4 col-md-3 col-sm-12">
        <div class="card">

            <div class="card-body">
                <p>Owner: {{ $car->user->name }}</p>
                <div class="d-flex">
                    <a href="/repairs/create" class="btn btn-success btn-block">Create Repair</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
