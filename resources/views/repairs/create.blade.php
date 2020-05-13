@extends('layouts.app')


@section('content')
@php
@session_start();

$car_id = $_SESSION['car_id'];
@endphp
<a href="/repairs/{{$car_id}}" class="btn btn-secondary mb-2">Go Back</a>
<h2 class="mt-2">Add Repairs</h2>
<div class="card">
    <div class="card-body">
        {{ Form::open(array('action' => 'RepairsController@store', 'method' => 'POST')) }}
        @csrf
        <div class="form-group">
            {{ Form::label('repair_title', 'Repair Title') }}
            {{ Form::text('repair_title', '', array('class' => 'form-control', 'placeholder' => 'Repair Title')) }}
        </div>
        <div class="form-group">
            {{ Form::label('repair_info', 'Repair Description') }}
            {{ Form::textarea('repair_info', '', array('class' => 'form-control', 'placeholder' => 'Repair Description')) }}
        </div>
        {{ Form::hidden('car_id', "{$car_id}") }}
        {{ Form::submit('Add Repair' , array('class' => 'btn btn-success')) }}
        {{ Form::close() }}
    </div>
</div>

@endsection
