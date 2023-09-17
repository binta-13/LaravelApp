<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FibonacciController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/register', [AuthController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class,'register']);
Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('soalTest1');
    });
    
    // Jika Anda ingin menambahkan rute lain yang hanya dapat diakses oleh pengguna yang sudah login, tambahkan di sini.
});

Route::resources([
    'transactions' => TransactionController::class,
]);

Route::get('/fibonacci', [FibonacciController::class, 'index']);
Route::post('/fibonacci', [FibonacciController::class, 'calculate']);



// Route::get('/', function () {
//     return view('soalTest1');
// });
