<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\IncomeFrom;
use App\Models\TicketHistory;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(Request $request)
    {
        $mobile = isset($request['mobile']) ? $request['mobile'] : "";

        $conditions = Discount::all();



        if ($mobile != "") {

            $sells = TicketHistory::where('mobile', $mobile)->paginate(15);

        } else {

            $sells = TicketHistory::paginate(15);

        }

        return view('admin.discount.index', compact('conditions', 'sells'));
    }
    public function sell_ticket()
    {
        $conditions = Discount::all();

        return view('admin.discount.sell_ticket', compact('conditions'));
    }

    public function sell_ticketSave(Request $request)
    {
        $sell_tic = new TicketHistory;

        $sell_tic->date = $request['date'];
        $sell_tic->time = $request['time'];
        $sell_tic->company_name = $request['company_name'];
        $sell_tic->mobile = $request['mobile'];
        $sell_tic->name = $request['name'];
        $sell_tic->quantity = $request['quantity'];
        $sell_tic->t_commission = $request['commission'];
        $sell_tic->save();

        return redirect()->route('admin.discount.index')->with('success', 'Ticket history added successfully.');

        // dd($request->toArray());

    }

    public function TicketHistorySave(Request $request)
    {
        $tic_his = new TicketHistory;

        $tic_his->date = $request['date'];
        $tic_his->time = $request['time'];
        $tic_his->company_name = $request['company_name'];
        $tic_his->name = $request['name'];
        $tic_his->mobile = $request['mobile'];
        $tic_his->quantity = $request['quantity'];
        $tic_his->t_commission = $request['t_commission'];
        $tic_his->save();

        return redirect()->route('admin.discount.index')->with('success', 'Ticket history added successfully.');

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
