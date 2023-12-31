<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\IncomeFrom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        $date = isset($request['date']) ? $request['date'] : "";

        $today = now()->format('Y-m-d');

        if ($date != "") {
            $incomes = Income::where('date', $date)
                ->orderBy('created_at', 'desc')
                ->get();

        } else {
            $incomes = Income::where('date', $today)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        $totalAmount = $incomes->sum('commission');

        $totalPassenger = $incomes->sum('quantity');

        $income_from = IncomeFrom::all();

        return view('admin.income.index', compact('incomes', 'income_from', 'totalAmount','totalPassenger'));
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
