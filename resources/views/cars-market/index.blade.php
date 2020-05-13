@extends('layouts.app')

@section('content')
<h1>Car Market</h1>
@if(count($cars)>0)

<div class="row mt-3">

    @foreach($cars as $car)
    <div class="col-md-4 col-sm-12 mb-4 p-0 border border-dark rounded overflow-hidden">
        <img src="/storage/car_images/{{$car->car_image}}" alt="" style="width:100%">

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h6>Brand: <span class="d-block text-primary">{{ $car->brand }}</span></h6>
                    <h6>Model: <span class="d-block text-primary">{{ $car->car_model }}</span></h6>

                </div>
                <div class="col-md-6 col-sm-12">
                    <h6>Engine Capacity: <span class="d-block text-primary">{{ $car->engine_capacity }} cm3</span>
                    </h6>
                    <h6>Horse Power: <span class="d-block text-primary">{{ $car->horse_power }}</span></h6>

                </div>
            </div>
            <a href="tel:{{ $car->user->number }}" class="btn btn-danger btn-block">Call Owner</a>
            <a href="" class="btn btn-primary btn-block">Show Details</a>
        </div>

    </div>

    @endforeach
</div>

@else
<p>There is no car for sell</p>
@endif



@endsection
