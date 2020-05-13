@extends('layouts.app')

@section('content')
@php
@session_start();
$servicer_id = $_SESSION['servicer_id'];
@endphp
<a href="/servicers/{{$servicer_id}}" class="btn btn-secondary mb-4">Go Back to Servicers</a>
@foreach($cars as $car)
@if($car->user_id == auth()->user()->id)

<div class="card mb-4">
    <div class="card-header">{{$car->brand}}</div>


    <div class="card-body">
        <ul class="list-item">
            <li class="list-group-item text-capitalize">Car Model: {{$car->car_model}}</li>
            <li class="list-group-item text-capitalize">Car Body: {{$car->car_body}}</li>
        </ul>
    </div>
    {{ Form::open(array('action' => array('HireServicersController@update',$servicer_id),'method' => 'POST')) }}
    {{ Form::hidden('id',  $car->id ) }}
    {{ Form::hidden('brand',  $car->brand ) }}
    {{ Form::hidden('car_model', $car->car_model) }}
    {{ Form::hidden('engine_capacity',  $car->engine_capacity) }}
    {{ Form::hidden('horse_power',  $car->horse_power)  }}
    {{ Form::hidden('car_body',  $car->car_body ) }}
    {{ Form::hidden('_method', 'PUT') }}
    @if($car->servicer_id == 0 && $car->sell_id == 0)
    {{ Form::submit('Hire Servicer for your '.$car->brand.'', array('class' => 'btn btn-success btn-block')) }}
    @elseif($car->sell_id != 0)
    {{ Form::submit('Your '.$car->brand.' is currently at sale', array('class' => 'btn btn-danger btn-block', 'disabled')) }}
    @else
    {{ Form::submit('Your '.$car->brand.' is currently at servicer', array('class' => 'btn btn-primary btn-block', 'disabled')) }}
    @endif
    {{ Form::close() }}

</div>
@endif
@endforeach
@endsection
