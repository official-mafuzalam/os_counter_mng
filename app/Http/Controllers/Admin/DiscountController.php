<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Income;
use App\Models\IncomeFrom;
use App\Models\TicketHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DiscountController extends Controller
{
    public function index(Request $request)
    {
        $mobile = isset($request['mobile']) ? $request['mobile'] : "";

        $date = isset($request['date']) ? $request['date'] : "";

        if ($date != "" && $mobile != "") {
            $sells = TicketHistory::where('date', $date)
                ->where('mobile', $mobile)
                ->orderBy('date', 'desc')
                ->paginate(15);
        } elseif ($date != "") {
            $sells = TicketHistory::where('date', $date)
                ->orderBy('date', 'desc')
                ->paginate(15);
        } elseif ($mobile != "") {
            $sells = TicketHistory::where('mobile', $mobile)
                ->orderBy('date', 'desc')
                ->paginate(15);
        } else {
            $sells = TicketHistory::orderBy('date', 'desc')
                ->paginate(15);
        }


        return view('admin.discount.index', compact('sells'));
    }
    public function sell_ticket()
    {
        $conditions = Discount::all();

        return view('admin.discount.sell_ticket', compact('conditions'));
    }

    public function get_name($mobile)
    {
        try {
            // Retrieve the name from the database based on the mobile number
            // Replace 'YourModel' with the actual model name you are using
            $name = TicketHistory::where('mobile', $mobile)->value('name');

            return response()->json($name);
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            Log::error($e);

            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
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

        $user = Auth::user();

        $income = new Income;

        $income->date = $request['date'];
        $income->time = $request['time'];
        $income->name = $request['company_name'];
        $income->quantity = $request['quantity'];
        $income->commission = $request['commission'];
        $income->user = $user->name;
        $income->save();

        return redirect()->route('admin.discount.index')->with('success', 'Ticket history added successfully.');

        // dd($request->toArray());

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
