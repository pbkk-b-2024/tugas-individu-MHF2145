<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Number;

class tugas1controller extends Controller
{
    public function showForm()
    {
        return view('math.evenodd');
    }

    public function checkNumber(Request $request)
    {
        $request->validate([
            'number' => 'required|integer',
        ]);

        $number = $request->input('number');
        $result = Number::checkEvenOdd($number);

        return view('math.evenodd', ['result' => $result, 'number' => $number]);
    }

    public function showPrimeForm()
    {
        return view('math.primenumber');
    }

    public function checkPrime(Request $request)
    {
        $request->validate([
            'number' => 'required|integer',
        ]);

        $number = $request->input('number');
        $result = Number::checkPrime($number);

        return view('math.primenumber', ['result' => $result, 'number' => $number]);
    }

    public function showFibonacciForm()
    {
        return view('math.fibonacci');
    }

    public function generateFibonacci(Request $request)
    {
        $request->validate([
            'number' => ['required', 'integer', 'min:1'],
        ]);

        $number = $request->input('number');
        $sequence = Number::getFibonacci($number);

        return view('math.fibonacci', ['sequence' => $sequence, 'number' => $number]);
    }
}
