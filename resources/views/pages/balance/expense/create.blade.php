@extends('scaffold.create-layout')
@section('create-content')         
    <div class="form-group">
        {!! FORM::label('name', 'Name :') !!}
        {!! FORM::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
    </div>            
        {!! FORM::hidden('code', null) !!}        
    <div class="form-group">
        {!! FORM::label('timestamp', 'Timestamp :') !!}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {!! FORM::text('timestamp', null, ['class'=>'form-control', 'placeholder'=>'Timestamp', 'id'=>'datePicker']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('expense_source', 'Expense Source :') !!}
        {!! Form::select('expense_source', $source, null, ['class' => 'form-control']) !!}
        {!! Form::label('expense_source_result', $sourceValue, ['style' => 'visibility:hidden', 'id' => 'lblSourceValue'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('bank_expense_dest', 'Bank Destination :') !!}
        {!! Form::select('bank_expense_dest', $bank, null, ['class' => 'form-control']) !!}        
    </div>
    <div class="form-group">
        {!! FORM::label('amount', 'Amount :') !!}
        {!! FORM::text('amount', null, ['class'=>'form-control', 'placeholder'=>'Enter Amount']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('description', 'Description :') !!}
        {!! FORM::textarea('description', null, ['size' => '30x5', 'class'=>'form-control', 'placeholder'=>'Enter Description']) !!}
    </div>
    @include('scaffold.button.button-save')
    @include('scaffold.button.button-back')
@endsection