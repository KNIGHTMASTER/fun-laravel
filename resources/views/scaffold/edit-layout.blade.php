@extends('scaffold.template')
@section('content')
    @include('scaffold.content-header')
    <section class="content">
        <div class="box">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update {{$entityName}}</h3>
                </div>
                {!! Form::model($data,['method' => 'PATCH','route'=>[$entityBaseUrl.'.update',$data->id]]) !!}
                <div class="box-body">
                    @include('scaffold.validation.alert-error-layout')
                    @yield('edit-content')
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@stop