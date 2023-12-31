<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $today = now()->format('Y-m-d');

        $date = isset($request['date']) ? $request['date'] : "";

        if ($date != "") {
            $expenses = Expense::where('date', $date)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $expenses = Expense::where('date', $today)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        $totalAmount = $expenses->sum('amount');

        return view('admin.expense.index', compact('expenses', 'totalAmount'));
    }

    public function expense_add()
    {
        $exp_cat = ExpenseCategory::all();

        return view('admin.expense.expense_add', compact('exp_cat'));
    }

    public function expense_addSave(Request $request)
    {
        $user = Auth::user();

        $expense = new Expense;

        $expense->date = $request['date'];
        $expense->time = $request['time'];
        $expense->name = $request['name'];
        $expense->amount = $request['amount'];
        $expense->user = $user->name;
        $expense->save();

        return to_route('admin.expense.index')->with('success', 'Expense added successfully.');

        // dd($request->toArray());

    }

    public function expense_category()
    {
        $exp_cat = ExpenseCategory::all();

        return view('admin.expense.category', compact('exp_cat'));
    }

    public function expense_categorySave(Request $request)
    {
        $exp_cat = new ExpenseCategory;

        $exp_cat->name = $request['name'];
        $exp_cat->save();

        return to_route('admin.expense.category')->with('success', 'Expense category added successfully.');
    }



}
