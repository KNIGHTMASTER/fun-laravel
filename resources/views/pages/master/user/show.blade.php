@extends('scaffold.show-layout')
@section('show-content')
    <div class="form-group">
        {!! FORM::label('code', 'Code') !!}
        {!! FORM::text('code', $data->user_code, ['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('name', 'Name :') !!}
        {!! FORM::text('name', $data->name, ['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('group', 'Group :') !!}
        {!! FORM::text('group', $data->group_id, ['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('expiredDate', 'Expired Date') !!}
        {!! FORM::text('expiredDate', $data->user_expired_date, ['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('description', 'Description') !!}
        {!! FORM::textarea('description', $data->description, ['size' => '30x5', 'class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    @include('scaffold.button.button-show-back')
@endsection