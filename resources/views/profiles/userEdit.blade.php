@extends('layouts.app')

@section('content')
<a href="/home" class="btn btn-secondary mb-2">Go Back</a>
<div class="card mt-2">
    <div class="card-body">
        {{ Form::open(array('action' => array('ProfilesEditUsersController@updateUser', $user->id), 'method' => 'POST')) }}
        <div class="form-group">
            {{ Form::label('name', 'Fullname') }}
            {{ Form::text('name', $user->name, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-mail Address') }}
            <p class="form-control">{{ $user->email }}</p>
            <small class="text-danger">You cannot change email address</small>
        </div>
        <div class="form-group">
            {{ Form::label('number', 'Number') }}
            {{ Form::text('number', $user->number, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('class' => 'form-control','placeholder' => 'Current password')) }}
        </div>
        <div class="form-group">
            {{ Form::label('newPassword', 'New Password') }}
            {{ Form::password('newPassword', array('class' => 'form-control','placeholder' => 'New password')) }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
        {{ Form::close() }}
    </div>
</div>
@endsection
