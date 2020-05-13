@extends('layouts.app')

@section('content')
<a href="/servicers" class="btn btn-secondary mb-5">Go Back</a>
<div class="row">
    <div class="col-md-8 col-sm-12">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <img class="border border-dark" src="/storage/cover_images/{{$servicer->cover_image}}" alt="" style="width: 100%; height:190px;">
            </div>
            <div class="col-md-7 col-sm-12">
                <h5>Company Name: <span class="text-primary">{{$servicer->company_name}}</span></h5>
                <h5>Servicer Name: <span class="text-primary">{{$servicer->name}}</span></h5>
                <h5>Rating: <span class="text-primary">{{3}}</span>/10</h5>
                @if(Auth::user())
                <a href="/hires/{{$servicer->id}}/edit" class="btn btn-primary">Hire Servicer</a>
                <?php
                session_start();
                $_SESSION['servicer_id'] = $servicer->id;
                ?>
                @endif
            </div>
        </div>
        <div class="card card-body mt-4 bg-dark text-white">
            <h5>Type of Service:</h5>
            <ul class="list-group">
                @switch($servicer->type_of_service)
                @case('autoelectrics')
                <li class="list-group-item bg-dark border border-primary mt-2">Auto-Electrics</li>
                @break
                @case('automechanics')
                <li class="list-group-item bg-dark border border-primary mt-2">Auto-Mechanics</li>
                @break
                @case('both')
                <li class="list-group-item bg-dark border border-primary mt-2">Auto-Electrics</li>
                <li class="list-group-item bg-dark border border-primary mt-2">Auto-Mechanics</li>
                @break


                @endswitch
            </ul>
        </div>

    </div>
    <div class="col-md-4 col-sm-12 position-sticky">
        <div class="sticky-top py-2">
            <p>Company Owner: <span class="text-primary">{{$servicer->owner_name}}</span></p>
            <p>Servicer {{$servicer->name}} joins site: <br>
                <span style="font-weight: bold;" class="text-success">{{$servicer->created_at}}</span></p>
            <a href="tel:{{$servicer->number}}" class="btn btn-danger">Call Servicer</a>
        </div>
    </div>
</div>
<!-- ********************* -->
<h3 class="mt-5 mb-3">
    <i class="fas fa-comment-alt mr-3"></i>{{count($countComments)}} Comments
</h3>
<div class="row">

    @foreach($comments as $comment)
    <div class="col-md-12">
        <hr>
        <div class="d-float">
            <img src={{'https://www.gravatar.com/avatar/'.  md5(strtolower(trim($comment->email))) }} alt="" style="width: 50px; height:50px; border-radius: 50%; float:left;" class="overflow-hidden mr-2">
            <div class="my-3">
                <p class="m-0">{{$comment->name}}</p>
                <small class="font-italic">{{date('d. F, Y - G:i',strtotime($comment->created_at))}}</small>
            </div>
        </div>
        <p class="mx-3" style="clear: both;">{{$comment->comment}}</p>
    </div>

    @endforeach
</div>
<div class="d-flex justify-content-center mt-2">{{$comments->links()}}</div>
<!-- ************************ -->
@if(Auth::check())
<div class="row mt-5">
    <div class="col-md-12">
        {{ Form::open(array('action' => 'CommentsController@store', 'method' => 'POST')) }}
        <div class="form-group">
            {{ Form::label('comment', 'Leave a Comment', array('class' => 'h2')) }}
            {{ Form::textarea('comment', '', array('class' => 'form-control', 'rows' => '5')) }}
        </div>
        {{ Form::hidden('servicer_id', $servicer->id) }}
        {{ Form::hidden('name',auth()->user()->name) }}
        {{ Form::hidden('email', auth()->user()->email) }}
        {{ Form::submit('Add Comment', array('class' => 'btn btn-dark')) }}
        {{ Form::close() }}
    </div>
</div>


@endif

@endsection
