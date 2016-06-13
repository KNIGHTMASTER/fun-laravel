@extends('scaffold.create-layout')
@section('create-content')
    <div class="form-group">
        {!! FORM::label('code', 'Code :') !!}
        {!! FORM::text('user_code', null, ['class'=>'form-control', 'placeholder'=>'Code']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('name', 'Name :') !!}
        {!! FORM::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('password', 'Password :') !!}
        {!! FORM::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('group_id', 'Group :') !!}
        {!! Form::select('group_id', $group, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('expiredDate', 'Expired Date :') !!}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {!! FORM::text('user_expired_date', null, ['class'=>'form-control', 'placeholder'=>'Expired Date', 'id'=>'datePicker']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! FORM::label('description', 'Description :') !!}
        {!! FORM::textarea('description', null, ['size' => '30x5', 'class'=>'form-control', 'placeholder'=>'Enter Description']) !!}
    </div>
    @include('scaffold.button.button-save')
    @include('scaffold.button.button-back')
@endsection