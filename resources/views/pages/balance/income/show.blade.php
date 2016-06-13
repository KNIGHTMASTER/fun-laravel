@extends('scaffold.show-layout')
@section('show-content')
    <div class="form-group">
        {!! FORM::label('code', 'Code') !!}
        {!! FORM::text('code', $data->code, ['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('name', 'Name') !!}
        {!! FORM::text('name', $data->name, ['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('amount', 'Amount') !!}
        {!! FORM::text('amount', $data->amount, ['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('description', 'Description') !!}
        {!! FORM::textarea('description', $data->description, ['size' => '30x5', 'class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    @include('scaffold.button.button-show-back')
@endsection