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
        {!! FORM::label('timestamp', 'Timestamp :') !!}
        {!! FORM::text('timestamp', $data->timestamp, ['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>    
    <div class="form-group">
        {!! FORM::label('expense_source', 'Expense Source :') !!}
        {!! FORM::text('expense_source', $data->expense_source, ['class'=>'form-control', 'readonly'=>'true']) !!}
        {!! Form::label('expense_source_result', $sourceValue, ['id' => 'lblSourceValue'])!!}
    </div>
    <div class="form-group">
        {!! FORM::label('amount', 'Amount :') !!}
        {!! FORM::text('amount', $data->amount, ['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('bank_expense', 'Bank :') !!}
        {!! FORM::text('bank', $data->bank, ['class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('description', 'Description :') !!}
        {!! FORM::textarea('description', $data->description, ['size' => '30x5', 'class'=>'form-control', 'readonly'=>'true']) !!}
    </div>
    @include('scaffold.button.button-show-back')
@endsection