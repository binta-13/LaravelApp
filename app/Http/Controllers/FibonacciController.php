<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    public function index()
    {
        return view('fibonacci.index');
    }

    public function calculate(Request $request)
    {
        $n1 = $request->input('n1');
        $n2 = $request->input('n2');

        // Fungsi untuk menghitung bilangan Fibonacci ke-n
        function fibonacci($n)
        {
            if ($n <= 0) {
                return 0;
            } elseif ($n == 1) {
                return 1;
            } else {
                return fibonacci($n - 1) + fibonacci($n - 2);
            }
        }

        $result = fibonacci($n1) + fibonacci($n2);

        return view('fibonacci.index', compact('result'));
    }
}
