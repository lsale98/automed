@extends('layouts.app')

@section('content')
<a href="/dashboard" class="btn btn-secondary mb-2">Go Back</a>
<div class="card mt-2">
    <div class="card-body">
        {{ Form::open(array('action' => array('ProfilesEditServicersController@updateServicer', $servicer->id), 'method' => 'POST','files' => 'true', 'enctype' => 'multipart/form-data')) }}
        <div class="form-group">
            {{ Form::label('name', 'Servicer Name') }}
            {{ Form::text('name', $servicer->name, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('owner_name', 'Owner Name') }}
            {{ Form::text('owner_name', $servicer->owner_name, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('company_name', 'Company Name') }}
            {{ Form::text('company_name', $servicer->company_name, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-mail Address') }}
            <p class="form-control">{{ $servicer->email }}</p>
            <small class="text-danger">You cannot change email address</small>
        </div>
        <div class="form-group">
            {{ Form::label('city', 'City') }}
            {{ Form::text('city', $servicer->city, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('address', 'Address') }}
            {{ Form::text('address', $servicer->address, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('number', 'Number') }}
            {{ Form::text('number', $servicer->number, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('cover_image', 'Cover Image' , array('class' => 'd-block')) }}
            {{ Form::file('cover_image') }}
        </div>
        <div class="form-group">
            {{ Form::label('type_of_service', 'Type of Service') }}
            {{ Form::select('type_of_service', array('autoelectrics' => 'Auto-Eletrics', 'automechanics' => 'Auto-Mechanics', 'both' => 'Both'),$servicer->type_of_service  ,array('class' => 'form-control')) }}
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
