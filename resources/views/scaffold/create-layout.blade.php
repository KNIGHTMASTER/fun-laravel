@extends('scaffold.template')
@section('content')
    @include('scaffold.content-header')
    <section class="content">
        <div class="box">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create {{ $entityBaseUrl }}</h3>
                </div>
                {!! FORM::open(['url' => $entityBaseUrl]) !!}
                <div class="box-body">
                    @yield('create-content')
                </div>
                {!! FORM::close() !!}
            </div>
        </div>
    </section>
@endsection