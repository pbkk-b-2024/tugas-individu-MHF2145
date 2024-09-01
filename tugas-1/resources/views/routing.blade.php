@extends('layouts.layout')

@section('content')
    <h1>Routing Page</h1>
    <h5>
    <p><a href="{{ url('/routing/basic') }}">Basic Routing</a></p>
    <p><a href="{{ url('/routing/named') }}">Named Routing</a></p>
    <p><a href="{{ url('/routing/grouped') }}">Grouped Routing</a></p>
    </h5>
@endsection
