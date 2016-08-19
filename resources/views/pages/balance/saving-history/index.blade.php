@extends('scaffold.index-table-layout')
@section('extra-filter')
    {{--<table>--}}
        {{--<tr class="box-header">--}}
            {{--<td>--}}
                {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon">--}}
                        {{--<i class="fa fa-calendar"></i>--}}
                    {{--</div>--}}
                    {{--{!! FORM::text('startDate', null, ['class'=>'form-control', 'placeholder'=>'Start Date', 'id'=>'datePicker']) !!}--}}
                {{--</div>--}}
            {{--</td>--}}

            {{--<td class="col-sm-7">--}}
                {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon">--}}
                        {{--<i class="fa fa-calendar"></i>--}}
                    {{--</div>--}}
                    {{--{!! FORM::text('endDate', null, ['class'=>'form-control', 'placeholder'=>'End Date', 'id'=>'datePicker2']) !!}--}}
                {{--</div>--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr class="box-header">--}}
            {{--<td>--}}
                {{--{!! FORM::hidden('searchComponent', 'fun-laravel/public/'.$entityBaseUrl) !!}--}}
                {{--<a href="#" class="btn btn-success fa fa-search" onclick="searchDataTable()"></a>--}}
            {{--</td>--}}
            {{--<td class="col-sm-12">--}}
                {{--<a href="#" class="btn btn-success fa fa-undo" onclick="resetSearchDataTable()"></a>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--</table>--}}
@endsection
