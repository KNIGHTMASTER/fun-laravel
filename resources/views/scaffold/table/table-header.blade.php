@extends('scaffold.template')

@section('content')
    @include('scaffold.content-header')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manage {!! $entityName !!}</h3>
            </div>
            {{-- @include('scaffold.validation.alert-error-search-table-layout') --}}
            @include('scaffold.validation.validation-search-table-layout')
            <table>
                <tr class="box-header">
                @if ($headerAction['search'] == 1)
                    <td>                    
                        {!! FORM::select('searchComponent', $sortableFields, null, ['class'=>'form-control']) !!}                    
                    </td>
                    <td>
                    <td class="col-sm-8">
                        {!! FORM::text('searchComponent', null, ['class'=>'form-control', 'placeholder'=>'Search', 'id'=>'txtSearchDataTable']) !!}
                    </td>
                </tr>
                <tr class="box-header">
                    <td>
                        {!! FORM::hidden('searchComponent', 'fun-laravel/public/'.$entityBaseUrl) !!}
                        <a href="#" class="btn btn-success fa fa-search" onclick="searchDataTable()"></a>
                    </td>
                    <td class="col-sm-12">
                        <a href="#" class="btn btn-success fa fa-undo" onclick="resetSearchDataTable()"></a>
                    </td>
                </tr>
                @endif

                @if ($headerAction['create'] == 1)
                <tr class="box-header">
                    <td>
                        <a id='btCreateNewData' href="{{URL::to($entityBaseUrl.'/create')}}" class="btn btn-success fa fa-plus-circle"> Create &nbsp;&nbsp;&nbsp;</a>
                    </td>
                </tr>
                @endif
                {{--<tr class="box-header">--}}
                    {{--<td>--}}
                        {{--@include('scaffold.table.table-entries-item')--}}
                    {{--</td>--}}
                {{--</tr>--}}
            </table>
            <hr>
            @yield('table')
        </div>
    </section>
@endsection