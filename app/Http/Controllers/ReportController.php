<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FinancialTransaction;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function indexReport(Request $request){
        
        $user = Auth::user();

        if ($request->datainicialdespesas == null && $request->datafinaldespesas == null) {
            $startDateExpenses = Carbon::now()->startOfMonth()->format('Y-m-d');
            $endDateExpenses = Carbon::now()->endOfMonth()->format('Y-m-d');
        } else {
            $startDateExpenses = $request->datainicialdespesas;
            if ($request->datafinaldespesas < $startDateExpenses) {
                $endDateExpenses = Carbon::parse($startDateExpenses)->endOfMonth()->format('Y-m-d');
            } else {
                $endDateExpenses = $request->datafinaldespesas;
            }            
        }

        if ($request->datainicialreceitas == null && $request->datafinalreceitas == null) {
            $startDateIncomes = Carbon::now()->startOfMonth()->format('Y-m-d');
            $endDateIncomes = Carbon::now()->endOfMonth()->format('Y-m-d');
        } else {
            $startDateIncomes = $request->datainicialreceitas;            
            if ($request->datafinalreceitas < $startDateIncomes) {
                $endDateIncomes = Carbon::parse($startDateIncomes)->endOfMonth()->format('Y-m-d');
            } else {
                $endDateIncomes = $request->datafinalreceitas;
            }
        }

        $transactions = FinancialTransaction::where('user_id', $user->id)
        ->whereBetween('date', [$startDateExpenses, $endDateExpenses])
        ->orderBy('created_at', 'desc')
        ->get();

        $expenses = FinancialTransaction::where('user_id', $user->id)
        ->where('type', 'expense')
        ->whereBetween('date', [$startDateExpenses, $endDateExpenses])
        ->orderBy('created_at', 'desc')
        ->get();

        $incomes = FinancialTransaction::where('user_id', $user->id)
        ->where('type', 'income')
        ->whereBetween('date', [$startDateIncomes, $endDateIncomes])
        ->orderBy('created_at', 'desc')
        ->get();

        $totalExpense = FinancialTransaction::where('user_id', $user->id)
        ->where('type', 'expense')
        ->whereBetween('date', [$startDateExpenses, $endDateExpenses])
        ->sum('amount');
        //$totalExpense = number_format($totalExpense, 2, ',', '.');

        $totalIncome = FinancialTransaction::where('user_id', $user->id)
        ->where('type', 'income')
        ->whereBetween('date', [$startDateIncomes, $endDateIncomes])
        ->sum('amount');
        //$totalIncome = number_format($totalIncome, 2, ',', '.');

        return view('dashboard', compact('transactions', 'incomes', 'expenses', 'totalExpense', 'totalIncome', 'startDateIncomes', 'endDateIncomes', 'startDateExpenses', 'endDateExpenses'));
    }
}
