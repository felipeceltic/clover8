<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\FinancialTransaction;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class FinanceController extends Controller
{
    public function expenseIndex(){
        return view('finance.expense');
    }

    public function incomeIndex(){
        return view('finance.income');
    }

    public function transactionStore(Request $request)
    {   
        $user = Auth::user();

        if ($request->repeat > 1) {

            $repeat = Collection::times($request->repeat, function ($index) {
                return $index; // Valor opcional a ser retornado para cada item da coleção
            });

            $transactioncollection = Collection::empty();
            $repeatoken = Uuid::uuid4()->toString();

            foreach ($repeat as $r) {
                $transactionrepeat = new FinancialTransaction;

                $transactionrepeat->user_id = $user->id;
                if (Route::currentRouteName() == "finance.expense.store") {
                    $transactionrepeat->type = 'expense';
                } else {
                    $transactionrepeat->type = 'income';
                }

                $transactionrepeat->description = $request->description;
                $transactionrepeat->user_id = $user->id;

                if (Route::currentRouteName() == "finance.expense.store") {
                    $transactionrepeat->amount = $request->amount/$request->repeat;
                } else {
                    $transactionrepeat->amount = $request->amount;
                }        

                if ($r > 1) {
                    $transactionrepeat->date = Carbon::parse($request->date)->addMonths($r-1);
                } else {
                    $transactionrepeat->date = Carbon::parse($request->date);
                }
                $transactionrepeat->repeatoken = $repeatoken;
                $transactionrepeat->repeat = $r;
                
                $transactioncollection->push($transactionrepeat);
            }
            
            foreach ($transactioncollection as $ec) {
                $ec->save();
            }
        } else {
            $transaction = new FinancialTransaction;

            $transaction->user_id = $user->id;
            $transaction->user_id = $user->id;
            if (Route::currentRouteName() == "finance.expense.store") {
                $transaction->type = 'expense';
            } else {
                $transaction->type = 'income';
            }
            $transaction->description = $request->description;        
            $transaction->amount = $request->amount;
            $transaction->date = Carbon::parse($request->date);
            $repeatoken = Uuid::uuid4()->toString();
            $transaction->repeatoken = $repeatoken;
            $transaction->repeat = 1;
            $transaction->save();
        }        
 
        return redirect()->back();
    }
}
