@extends('scaffold.edit-layout')
@section('edit-content')
    @include('scaffold.validation.validation-layout')
    <div class="form-group">
        {!! FORM::label('user_code', 'Code :') !!}
        {!! FORM::text('user_code', null, ['class'=>'form-control', 'placeholder'=>$data->user_code]) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('name', 'Name :') !!}
        {!! FORM::text('name', null, ['class'=>'form-control', 'placeholder'=>$data->name]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('group_id', 'Group :') !!}
        {!! Form::select('group_id', $group, $data->group_id, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('expiredDate', 'Expired Date :') !!}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {!! FORM::text('user_expired_date', null, ['class'=>'form-control', 'placeholder'=>$data->user_expired_date, 'id'=>'datePicker']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! FORM::label('description', 'Description :') !!}
        {!! FORM::textarea('description', null, ['size' => '30x5', 'class'=>'form-control', 'placeholder'=>$data->description]) !!}
    </div>
    @include('scaffold.button.button-update')
    @include('scaffold.button.button-back')
@endsection