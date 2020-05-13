@extends('layouts.app')

@section('content')
<h1 class="mb-4">All Servicers</h1>

<div class="row py-2">
    <div class="col-md-3 col-sm-12 position-sticky">
        <!-- <div class="card card-body mb-2"> -->

        <div class="sticky-top py-3">
            <form action="/servicers/search" method="GET">

                <div>
                    <p>Select city:</p>

                    <select name="city" id="city" class="form-control mb-3" required autocomplete="city" autofocus>
                        <option value="all">All</option>
                        @foreach($cities as $city)
                        <option value="{{$city->city}}">{{$city->city}}</option>
                        @endforeach

                    </select>
                </div>
                <input name="submit" class="btn btn-primary" type="submit" value="Filter">
            </form>
        </div>

        <!-- </div> -->
    </div>
    @if(count($servicers)>0)
    <div class="col-md-9 col-sm-12">
        @foreach($servicers as $servicer)
        <div class="card card-body mb-2" style="min-height: 271px">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img src="/storage/cover_images/{{ $servicer->cover_image }}" style="width: 100%; height:230px;">
                </div>
                <div class="col-md-8 col-sm-8 p-3">
                    <h3 class="text-center mb-3"><a href="/servicers/{{$servicer->id}}">{{ $servicer->company_name }}</a></h3>

                    <h4>Company Address: {{$servicer->city}} | {{$servicer->address}}</h4>
                    <h5>Type of Service:</h5>
                    <ul class="list-group">
                        @switch($servicer->type_of_service)
                        @case('autoelectrics')
                        <li class="list-group-item">Auto-Electrics</li>
                        @break
                        @case('automechanics')
                        <li class="list-group-item">Auto-Mechanics</li>
                        @break
                        @case('both')
                        <li class="list-group-item">Auto-Electrics</li>
                        <li class="list-group-item">Auto-Mechanics</li>
                        @break


                        @endswitch
                    </ul>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
{{ $servicers->links() }}
@else
<p>No Servicers to show</p>
@endif
@endsection
