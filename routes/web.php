<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard.default');
});

//User profile
Route::post('/user/profile', [UserController::class, 'profileUpdate'])->name('user.profile.update');
Route::post('/user/profile/password', [UserController::class, 'passwordUpdate'])->name('user.password.update');

//Finance expense
Route::get('/finance/expense', [FinanceController::class, 'expenseIndex'])->name('finance.expense');
Route::post('/finance/expense', [FinanceController::class, 'transactionStore'])->name('finance.expense.store');

//Finance income
Route::get('/finance/income', [FinanceController::class, 'incomeIndex'])->name('finance.income');
Route::post('/finance/income', [FinanceController::class, 'transactionStore'])->name('finance.income.store');

//Finance reports
Route::get('/dashboard', [ReportController::class, 'indexReport'])->name('reports.index');
Route::post('/dashboard/expense', [ReportController::class, 'indexReport'])->name('reports.expense');
Route::post('/dashboard/income', [ReportController::class, 'indexReport'])->name('reports.income');
