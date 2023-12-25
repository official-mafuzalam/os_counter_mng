<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\IncomeFrom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::all();

        $income_from = IncomeFrom::all();

        return view('admin.income.index', compact('incomes', 'income_from'));
    }

    public function dataSave(Request $request)
    {
        $user = Auth::user();

        $income = new Income;

        $income->date = $request['date'];
        $income->time = $request['time'];
        $income->name = $request['name'];
        $income->quantity = $request['quantity'];
        $income->commission = $request['commission'];
        $income->user = $user->name;
        $income->save();

        return redirect()->route('admin.income.index')->with('success', 'Income added successfully.');

        // dd($request->toArray());
    }

    public function income_from()
    {
        $income_from = IncomeFrom::all();

        return view('admin.income.income_from', compact('income_from'));
    }

    public function income_fromSave(Request $request)
    {
        $income_from = new IncomeFrom;

        $income_from->name = $request['name'];
        $income_from->save();

        return redirect()->route('admin.income.income_from')->with('success', 'Income Form added successfully.');

        // dd($request->toArray());
    }
}
