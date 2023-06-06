<?php

use Illuminate\Support\Facades\Route;

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
    })->name('dashboard');
});

//Finance Index
Route::get('/finance/index', [FinanceController::class, 'index'])->name('finance.index');
Route::post('/finance/expense', [FinanceController::class, 'expenseStore'])->name('finance.expense.store');
Route::post('/finance/income', [FinanceController::class, 'incomeStore'])->name('finance.income.store');

//Finance reports
Route::get('/reports/index', [ReportController::class, 'indexReport'])->name('reports.index');
Route::post('/reports/expense', [ReportController::class, 'indexReport'])->name('reports.expense');
Route::post('/reports/income', [ReportController::class, 'indexReport'])->name('reports.income');
