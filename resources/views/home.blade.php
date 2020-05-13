@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{auth()->user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="/cars" class="btn btn-primary">Create Car Profil</a>
                </div>
            </div>
            <div class="card mt-4">
                <h5 class="card-header">Your Cars</h5>
                <a href="/status" class="btn btn-danger text-white">See cars status</a>
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Car Brand</th>
                                <th scope="col">Car Model</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        @foreach($cars as $car)
                        @if($car->user_id == auth()->user()->id)
                        <tbody>
                            <tr>
                                <td>{{$car->brand}}</td>
                                <td>{{$car->car_model}}</td>
                                <td><a href="/cars/{{ $car->id }}" class="btn btn-success">Show</a></td>
                                <td>
                                    @if($car->servicer_id == 0 && $car->sell_id == 0)
                                    <a href="/cars/{{ $car->id }}/edit" class="btn btn-primary">Edit</a>
                                    @else
                                    <a href="/cars/{{ $car->id }}/edit" class="btn btn-primary disabled">Edit</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @endif
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
