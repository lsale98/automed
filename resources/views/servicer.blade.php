@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Service Shop: <span class="text-uppercase text-primary" style="font-weight: bold;">{{ auth()->user()->company_name }}</span></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    All cars at your service shop!
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Car Owner</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                    @if ($car->servicer_id == auth()->user()->id)
                    <tr>
                        <td>{{$car->brand}}</td>
                        <td>{{ $car->car_model }}</td>
                        <td>{{ $car->user->name }}</td>
                        <td><a href="/repairs/{{ $car->id }}" class="btn btn-primary">Add Repairs</a></td>
                        <td>
                            {{ Form::open(array('action' => array('ServicersController@update',$car->id),'method' => 'POST')) }}
                            {{ Form::hidden('id',  $car->id ) }}
                            {{ Form::hidden('brand',  $car->brand ) }}
                            {{ Form::hidden('car_model', $car->car_model) }}
                            {{ Form::hidden('engine_capacity',  $car->engine_capacity) }}
                            {{ Form::hidden('horse_power',  $car->horse_power)  }}
                            {{ Form::hidden('car_body',  $car->car_body ) }}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ Form::submit('Service is finished for '.$car->brand.'', array('class' => 'btn btn-danger btn-block')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endif

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
