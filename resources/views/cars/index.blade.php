@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/home" class="btn btn-secondary mb-3">Go back</a>
            <div class="card">

                <div class="card-body">


                    <h1 class="text-center">Add Your Car</h1>

                    {!! Form::open(array('action' => 'CarsController@store', 'method' => 'POST', 'files' => 'true', 'enctype' => 'multipart/form-data')) !!}
                    <div class="form-group">
                        {{ Form::label('brand', 'Car Brand') }}
                        {{ Form::text('brand', '', array('class' => 'form-control', 'placeholder' => 'Car Brand')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('car_model', 'Car Model') }}
                        {{ Form::text('car_model', '', array('class' => 'form-control', 'placeholder' => 'Car Model')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('engine_capacity', 'Engine Capacity (cm3)') }}
                        {{ Form::text('engine_capacity', '', array('class' => 'form-control', 'placeholder' => 'Engine Capacity (1.6 = 1600cm3)')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('horse_power', 'Horse Power') }}
                        {{ Form::text('horse_power', '', array('class' => 'form-control', 'placeholder' => 'Horse Power')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('car_body', 'Car Body') }}
                        {{ Form::select('car_body', array('sedan' => 'Sedan', 'coupe' => 'Coupe', 'hatchback' => 'Hatchback', 'van' => 'Van', 'convertible' => 'Convertible', 'station_wagon' => 'Station Wagon', 'suv' => 'SUV' ),'Sedan' ,array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('car_image', 'Car Image' , array('class' => 'd-block')) }}
                        {{ Form::file('car_image') }}
                    </div>

                    {{ Form::submit('Add Car', array('class' => 'btn btn-primary')) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
