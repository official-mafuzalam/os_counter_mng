<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\IncomeFrom;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        return view('admin.discount.index');
    }

    public function discount_condition()
    {
        $income_from = IncomeFrom::all();

        $conditions = Discount::all();

        return view('admin.discount.condition', compact('income_from', 'conditions'));
    }

    public function discount_conditionSave(Request $request)
    {
        $dis_con = new Discount;

        $dis_con->name = $request['name'];
        $dis_con->quantity = $request['quantity'];
        $dis_con->discount = $request['discount'];
        $dis_con->save();

        return redirect()->route('admin.discount.condition')->with('success', 'Discount condition added successfully.');
    }



}
