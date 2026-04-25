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
        $('#message').append('<div>Script loaded successfully !</div>');
    </script>
@endsection

@section('contents')
    <span class="hello">For the sons of men, and the gals of women, hello, world !</span>

    <p>{{ $result }}</p>

    <div id="message"></div>

    <fieldset>
        <legend>Dumps</legend>
        <pre>{{ $dumps }}</pre>
    </fieldset>
@endsection