@extends('layouts.layout')

@section('content')
<h1>Fibonacci Sequence Generator</h1>

<h2>Generate Fibonacci Sequence</h2>
<p>Enter a number to generate the Fibonacci sequence up to that number.</p>

<!-- Form to submit the number -->
<form action="{{ route('check.fibonacci') }}" method="POST">
    @csrf
    <div class="mb-3">
        <input type="number" name="number" placeholder="Enter a number" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Generate</button>
</form>

@if(isset($sequence))
<pre>
    <code>
        Fibonacci Sequence: {{ implode(', ', $sequence) }}
    </code>
</pre>
@endif

<sub>This will generate the Fibonacci sequence up to the entered number</sub>
@endsection
