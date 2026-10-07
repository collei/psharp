@extends('layout.app')

@section('app-title')
    A sample PSharp Application
@endsection

@section('styles')
    <style>
    span.hello {
        font-size: 36px;
        background: linear-gradient(to right, red, blue, green);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    </style>
@endsection

@section('scripts')
    <script>
//
    </script>
@endsection

@section('contents')
    <h1>Search</h1>

    <p>Searching for {{ $term }} on Chamber {{ $type }}.</p>
@endsection