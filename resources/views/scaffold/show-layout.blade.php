@extends('scaffold.template')
@section('content')
    @include('scaffold.content-header')
    <section class="content" xmlns="http://www.w3.org/1999/html">
        <div class="box">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Show {{$entityName}}</h3>
                </div>
                <div class="box-body">
                    @yield('show-content')
                </div>
            </div>
        </div>
    </section>
@stop