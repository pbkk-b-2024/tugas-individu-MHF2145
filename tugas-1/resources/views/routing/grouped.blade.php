@extends('layouts.layout')

@section('content')
<h1>3. Route Grouping</h1>

<h2>Grouped Routing</h2>
<p>Route grouping allows you to group routes that share common attributes, such as middleware or URL prefixes. This helps to organize your routes and apply attributes more efficiently.</p>
<sub>For Example, try to simulate grouping routes with a common URL prefix below:</sub>

<!-- Two text fields for simulating grouping routes -->
<div class="mb-3">
    <input type="text" id="routePrefix" placeholder="Enter route prefix" class="form-control mb-2">
    <input type="text" id="routeName" placeholder="Enter route name" class="form-control">
</div>

<!-- Display the result of grouping routes -->
<pre>
    <code>
        <!-- Example of grouped routes result -->
        <!-- URL: http://127.0.0.1:8000/{prefix}/{name} -->
        URL: http://127.0.0.1:8000/<span id="prefixDisplay"></span>/<span id="nameDisplay"></span>
    </code>
</pre>

<sub>This is how route grouping works.</sub>

<script>
    // Function to update the displayed URL with the text field values
    document.getElementById('routePrefix').addEventListener('input', function() {
        var prefix = this.value;
        document.getElementById('prefixDisplay').textContent = prefix;
    });

    document.getElementById('routeName').addEventListener('input', function() {
        var name = this.value;
        document.getElementById('nameDisplay').textContent = name;
    });
</script>

@endsection
