@extends('layouts.layout')

@section('content')
<h1>Prime Number Check</h1>

<h2>Check if a Number is Prime</h2>
<p>Enter a number to determine if it's a prime number.</p>

<!-- Form to submit the number -->
<form action="{{ route('check.prime') }}" method="POST">
    @csrf
    <div class="mb-3">
        <input type="number" name="number" placeholder="Enter a number" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Check</button>
</form>

@if(isset($result))
<pre>
    <code>
        Result: The number {{ $number }} is {{ $result }}.
    </code>
</pre>
@endif

<sub>This will tell you whether the number is prime or not</sub>
@endsection
