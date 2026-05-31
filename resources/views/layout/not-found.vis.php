@extends('layout.app')

@section('app-title')
    Page Not Found !
@endsection

@section('styles')
    <style>
    span.notfound {
        font-size: 36px;
        background: linear-gradient(to right, red, blue, green);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent !important;
    }
    </style>
@endsection

@section('scripts')
    <script>
    </script>
@endsection

@section('contents')
    <p><span class="notfound">Page Not Found !</span></p>

    <p>The URL <span class="text-danger">{{ $url }}</span> was not found.</p>

    <p>Go to <a href="{{ route('index.home') }}">home page</a>.</p>

    <p>Please double check the URL you typed or the link you've got.</p>
@endsection