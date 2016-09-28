@extends('dashboard.masterpage.dashboard')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css") }}">
@endsection

@section('content')
    @foreach($data as $occasion)
        <pre>
            {!! $occasion !!}
        </pre>
    @endforeach
@endsection