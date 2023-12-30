<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();

        return view('admin.expense.index', compact('expenses'));
    }

    public function expense_add()
    {
        $exp_cat = ExpenseCategory::all();

        return view('admin.expense.expense_add', compact('exp_cat'));
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
