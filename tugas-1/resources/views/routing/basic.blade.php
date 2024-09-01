@extends('layouts.layout')

@section('content')
<h1>1. Basic  Route</h1>

<h2>Basic and Fallback Routing</h2>
<p>Basic Routing is Simple URL to response mapping and on the other side Fallback Routing is Handle requests that don’t match any existing routes, often used for redirection or displaying a 404 page.</p>
<sub>For Example:</sub>
<p><a href="{{ route('math.page') }}">Basic route - Math Page</a></p>
<pre>
    <code>
        URL: http://127.0.0.1:8000/routing/math
    </code>
</pre>
<p><a href="{{ route('home') }}">Fallback route - Home Page</a></p>
<pre>
    <code>
        URL: http://127.0.0.1:8000/routing/home
    </code>
</pre>
<sub>This will lead to the Math Page</sub>
@endsection
