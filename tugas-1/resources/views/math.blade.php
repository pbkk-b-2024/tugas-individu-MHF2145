@extends('layouts.layout')

@section('content')
<h1>Math Page</h1>

<h5>
    <p><a href="{{ route('math.evenodd') }}">Even or Odd</a></p>
    <p><a href="{{ route('math.primenumber') }}">Prime Number</a></p>
    <p><a href="{{ route('math.fibonacci') }}">Fibonacci</a></p>
</h5>
@endsection
