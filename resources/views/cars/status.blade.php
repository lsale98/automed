@extends('layouts.app')

@section('content')
<a href="/home" class="btn btn-secondary mb-3">Go Back</a>
<div class="card">
    <div class="card-header">Status</div>
    <div class="card-body">
        @if (count($cars)>0)
        @foreach ($cars as $car )
        @if($car->user_id == auth()->user()->id)
        <div class="card mb-3">
            <div class="card-header">{{ $car->brand }} {{ $car->car_model }}</div>
            <div class="card-body">
                <p>Status:
                    @if($car->servicer_id == 0 && $car->sell_id == 0)

                    <span class="text-success">Not at the Servicer</span>
                    @elseif($car->sell_id != 0)
                    <span class="text-primary">Car is at sale market</span>
                    @else
                    <span class="text-danger">At the Servicer</span>
                    <p>Servicer: {{ $car->servicer->name }}</p>
                    @endif
                </p>
            </div>
        </div>
        @endif
        @endforeach
        @else
        <p>There si no car!</p>
        @endif
    </div>
</div>

@endsection
