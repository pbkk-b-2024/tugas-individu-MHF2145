<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    public static function checkEvenOdd($number)
    {
        return ($number % 2 === 0) ? 'even' : 'odd';
    }

    public static function checkPrime($number)
    {
        if ($number <= 1) {
            return 'not prime';
        }

        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return 'not prime';
            }
        }

        return 'prime';
    }

    public static function getFibonacci($n)
    {
        $fibonacci = [];

        if ($n <= 0) {
            return $fibonacci;
        }

        $fibonacci[] = 0;
        if ($n == 1) {
            return $fibonacci;
        }

        $fibonacci[] = 1;

        for ($i = 2; $i < $n; $i++) {
            $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        }

        return $fibonacci;
    }
}
