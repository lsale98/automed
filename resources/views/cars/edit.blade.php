@extends('layouts.app')

@section('content')
<a href="/home" class="btn btn-secondary mb-2">Go Back</a>
<h1 class="mb-2">Edit your {{$car->brand}} {{$car->car_model}}</h1>
<div class="card">
    <div class="card-body">
        {{ Form::open(array('action' => array('CarsController@update',$car->id),'method' => 'POST', 'files' => 'true', 'enctype' => 'multipart/form-data')) }}
        {{ Form::hidden('id', $car->id) }}
        <div class="form-group">
            {{ Form::label('brand', 'Car Brand') }}
            {{ Form::text('brand',  $car->brand, array('class' => 'form-control') ) }}
        </div>
        <div class="form-group">
            {{ Form::label('car_model', 'Car Model') }}
            {{ Form::text('car_model',  $car->car_model, array('class' => 'form-control') ) }}
        </div>
        <div class="form-group">
            {{ Form::label('engine_capacity', 'Engine Capacity') }}
            {{ Form::text('engine_capacity',  $car->engine_capacity, array('class' => 'form-control') ) }}
        </div>
        <div class="form-group">
            {{ Form::label('horse_power', 'Horse Power') }}
            {{ Form::text('horse_power',  $car->horse_power, array('class' => 'form-control') ) }}
        </div>
        <div class="form-group">
            {{ Form::label('car_image', 'Car Image' , array('class' => 'd-block')) }}
            {{ Form::file('car_image') }}
        </div>
        <div class="form-group">
            {{ Form::label('car_body', 'Car Body') }}
            {{ Form::select('car_body', array('sedan' => 'Sedan', 'coupe' => 'Coupe', 'hatchback' => 'Hatchback', 'van' => 'Van', 'convertible' => 'Convertible', 'station_wagon' => 'Station Wagon', 'suv' => 'SUV' ),$car->car_body  ,array('class' => 'form-control')) }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        @if ($car->servicer_id == 0)
        {{ Form::submit('Edit '.$car->brand.'', array('class' => 'btn btn-success')) }}
        @else
        <p>You cannot edit Car Profile because car is at service</p>
        <button class="btn btn-success" disabled>Edit</button>
        @endif
        {{ Form::close() }}
    </div>
</div>
@endsection
