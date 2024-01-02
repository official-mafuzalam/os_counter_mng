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

        $today = now()->format('Y-m-d');

        if ($date != "" && $mobile != "") {
            $sells = TicketHistory::where('date', $date)
                ->where('mobile', $mobile)
                ->orderBy('date', 'desc')
                ->get();
        } elseif ($date != "") {
            $sells = TicketHistory::where('date', $date)
                ->orderBy('date', 'desc')
                ->get();
        } elseif ($mobile != "") {
            $sells = TicketHistory::where('mobile', $mobile)
                ->orderBy('date', 'desc')
                ->get();
        } else {
            $sells = TicketHistory::where('date', $today)
                ->orderBy('date', 'desc')
                ->get();
        }


        return view('admin.discount.index', compact('sells'));
    }
    public function sell_ticket()
    {
        $conditions = IncomeFrom::all();

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

        return redirect()->route('admin.discount.index')->with('success', 'Ticket sold successfully.');

        // dd($request->toArray());

    }

    public function sell_ticketStatus($id, $status)
    {
        $history = TicketHistory::find($id);

        if ($history) {
            if ($status == 1) {

                $history->status = 1;
                $history->save();

                $user = Auth::user();

                $income = new Income;

                $income->date = $history->date;
                $income->time = $history->time;
                $income->name = $history->company_name;
                $income->quantity = $history->quantity;
                $income->commission = $history->t_commission;
                $income->user = $user->name;
                $income->save();

                return redirect()->route('admin.discount.index')->with('success', 'Ticket delivery successfully.');
            } else {

                $history->status = 2;
                $history->save();

                return redirect()->route('admin.discount.index')->with('success-delete', 'Ticket cancel successfully.');
            }

        } else {
            return redirect()->route('admin.discount.index')->with('success-trash', 'Item not found.');
        }


        // dd($history->toArray());


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

    public function condition_edit($id)
    {
        // Retrieve item data by ID
        $item = Discount::find($id);

        if (!$item) {
            return to_route('admin.discount.condition')->with('success-trash', 'item not found.');
        } else {
            return view('admin.discount.condition_edit', compact('item'));
        }

    }



}
