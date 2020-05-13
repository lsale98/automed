@extends('layouts.app')

@section('content')
@php
session_start();
$_SESSION['car_id'] = $car->id;

@endphp
<a href="/home" class="btn btn-secondary mb-2">Go Back</a>

<div class="row mt-2">
    <div class="col-md-4 col-sm-12 position-sticky">
        <div class="sticky-top pt-3">
            <img src="/storage/car_images/{{ $car->car_image }}" alt="{{$car->brand}} {{$car->car_model}} image" style="width:100%;">
            <div class="card mt-3">
                <div class="card-header text-center">
                    Profile Info
                </div>
                <div class="card-body">
                    <p>Car Profile created at: <span class="d-block text-danger">{{ $car->created_at }}</span></p>
                    <p>Car Profile last updated at: <span class="d-block text-success">{{ $car->updated_at }}</span></p>
                    @if($car->sell_id == 0)
                    {{ Form::open(array('action' => array('CarsMarketController@update', $car->id), 'method' => 'POST')) }}
                    {{ Form::hidden('sell_id', 1) }}
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::submit('Sell Car', array('class' => 'btn btn-primary btn-block mb-5')) }}
                    {{ Form::close() }}
                    @else
                    {{ Form::open(array('action' => array('CarsMarketController@update', $car->id), 'method' => 'POST')) }}
                    {{ Form::hidden('sell_id', 0) }}
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::submit('Pull the Car from sale', array('class' => 'btn btn-primary btn-block mb-5')) }}
                    {{ Form::close() }}
                    @endif
                    <!-- ************************************************ -->
                    @if ($car->servicer_id == 0 && $car->sell_id == 0)
                    {{ Form::open(array('action' => array('CarsController@destroy', $car->id), 'method' => 'POST')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete Car Profile', array('class' => 'btn btn-danger btn-block mt-5')) }}
                    {{ Form::close() }}
                    @elseif($car->sell_id != 0)

                    <button class="btn btn-danger btn-block" disabled>Delete Car Profile</button>
                    <small>You cannot delete Car Profile because car is at sale</small>
                    @else

                    <button class="btn btn-danger btn-block" disabled>Delete Car Profile</button>
                    <small>You cannot delete Car Profile because car is at service</small>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-8 col-sm-12 pt-3">

        <div class="card">
            <div class="card-header text-center">
                Car Info
            </div>
            <div class="card-body">
                <p>Brand: {{$car->brand}}</p>
                <p>Model: {{ $car->car_model }}</p>
                <p>Engine Capacity: {{ $car->engine_capacity }} cm3</p>
                <p>Horse Power: {{ $car->horse_power }}</p>
                <p>Repairs: {{ count($repairs) }} repairs</p>
                @if (count($repairs) > 0)
                <ul class="list-group">
                    @foreach ($repairs as $repair )
                    <li class="list-group-item border border-primary mb-2">{{ $repair->repair_title }}
                        <p class="d-block">{{ $repair->repair_info }}</p>
                        <p>Service Company: {{ $repair->servicer->company_name }}</p>
                        <p>Servicer: {{ $repair->servicer->name }}</p>
                        <p>Date and Time: <span class="text-danger">{{ $repair->created_at }}</span></p>
                    </li>

                    @endforeach
                </ul>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection
