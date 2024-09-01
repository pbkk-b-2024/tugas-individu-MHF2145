@extends('layouts.layout')

@section('content')
<h1>2. Parameter and Named Routing</h1>

<h2>Parameter Routing</h2>
<p>Parameter routing allows you to define routes with dynamic segments that capture values from the URL. This is useful for handling variable data like user IDs or categories.</p>
<sub>For Example, try to enter a parameter below:</sub>

<input type="text" id="parameter" placeholder="Enter parameter" class="form-control">

<pre>
    <code>
        URL: http://127.0.0.1:8000/user/<span id="parameterDisplay"></span>
    </code>
</pre>

<sub>This is how parameter routing works</sub>

<script>
    // Function to update the displayed URL with the text field value
    document.getElementById('parameter').addEventListener('input', function() {
        var paramValue = this.value;
        document.getElementById('parameterDisplay').textContent = paramValue;
    });
</script>

<h2>Named Routing</h2>
<p>Named routing assigns a name to a route, making it easier to generate URLs or redirects. This helps avoid hardcoding URLs and makes your code more maintainable.</p>
<sub>For Example, try to enter a route name below:</sub>

<input type="text" id="namedroute" placeholder="Enter route name" class="form-control">

<pre>
    <code>
        URL: http://127.0.0.1:8000/routing/<span id="routeNameDisplay"></span>
    </code>
</pre>

<sub>This is how named routing works</sub>

<script>
    // Function to update the displayed URL with the text field value
    document.getElementById('namedroute').addEventListener('input', function() {
        var routeName = this.value;
        document.getElementById('routeNameDisplay').textContent = routeName;
    });
</script>
@endsection
