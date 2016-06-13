@extends('scaffold.edit-layout')
@section('edit-content')    
    <div class="form-group">
        {!! FORM::label('code', 'Code :') !!}
        {!! FORM::text('code', null, ['class'=>'form-control', 'placeholder'=>$data->code]) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('name', 'Name :') !!}
        {!! FORM::text('name', null, ['class'=>'form-control', 'placeholder'=>$data->name]) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('description', 'Description :') !!}
        {!! FORM::textarea('description', null, ['size' => '30x5', 'class'=>'form-control', 'placeholder'=>$data->description]) !!}
    </div>
    @include('scaffold.button.button-update')
    @include('scaffold.button.button-back')
@endsection