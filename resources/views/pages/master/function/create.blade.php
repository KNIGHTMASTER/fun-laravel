@extends('scaffold.create-layout')
@section('create-content')   
    <div class="form-group">
        {!! FORM::label('code', 'Code :') !!}
        {!! FORM::text('code', null, ['class'=>'form-control', 'placeholder'=>'Enter Code']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('name', 'Name :') !!}
        {!! FORM::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('description', 'Description :') !!}
        {!! FORM::textarea('description', null, ['size' => '30x5', 'class'=>'form-control', 'placeholder'=>'Enter Description']) !!}
    </div>
    @include('scaffold.button.button-save')
    @include('scaffold.button.button-back')
@endsection