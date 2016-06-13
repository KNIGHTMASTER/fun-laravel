@extends('scaffold.edit-layout')
@section('edit-content')    
    <div class="form-group">
        {!! FORM::label('name', 'Name :') !!}
        {!! FORM::text('name', null, ['class'=>'form-control', 'placeholder'=>$data->name]) !!}
    </div>    
    <div class="form-group">
        {!! FORM::label('timestamp', 'Timestamp :') !!}
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {!! FORM::text('timestamp', null, ['class'=>'form-control', 'placeholder'=>$data->timestamp, 'id'=>'datePicker']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! FORM::label('expense_source', 'Expense Source :') !!}
        {!! FORM::select('expense_source', $source, $data->expense_source, ['class' => 'form-control']) !!}
        {!! Form::label('expense_source_result', $sourceValue, ['style' => 'visibility:visible', 'id' => 'lblSourceValue'])!!}
    </div>
    <div class="form-group">
        {!! FORM::label('amount', 'Amount :') !!}
        {!! FORM::text('amount', null, ['class'=>'form-control', 'placeholder'=>$data->amount]) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('bank_expense_dest', 'Bank :') !!}            
        {!! FORM::select('bank_expense_dest', $bank, $data->bank_expense, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('description', 'Description :') !!}
        {!! FORM::textarea('description', null, ['size' => '30x5', 'class'=>'form-control', 'placeholder'=>$data->description]) !!}
    </div>
    @include('scaffold.button.button-update')
    @include('scaffold.button.button-back')
@endsection