<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Expense;
use App\Models\Income;
use App\Models\TicketHistory;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {

        $discounts = Discount::all();


        // Get the current month and year
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        // Fetch data from the Income model for the current month
        $ticketHistoryData = Income::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->groupBy('date')
            ->selectRaw('date, SUM(commission) as total_amount')
            ->orderBy('date')
            ->get();

        // Extract dates and amounts from the fetched and aggregated data
        $dates = $ticketHistoryData->pluck('date')->toArray();
        $amounts = $ticketHistoryData->pluck('total_amount')->toArray();

        $sellsAmount = (new LarapexChart)->setType('area')
            ->setTitle('Total Monthly Sells')
            ->setSubtitle('Current Month')
            ->setXAxis($dates)
            ->setGrid(false, '#3F51B5', 0.1)
            ->setColors(['#FFC107', '#303F9F'])
            ->setMarkers(['#FF5722', '#E040FB'], 7, 10)
            ->setDataset([
                [
                    'name' => 'Amount',
                    'data' => $amounts
                ]
            ]);

        // Fetch data from the Income model for the current month
        $passengerData = Income::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->groupBy('date')
            ->selectRaw('date, SUM(quantity) as total_passengers')
            ->orderBy('date')
            ->get();

        // Extract dates and amounts from the fetched and aggregated data
        $passengerDates = $passengerData->pluck('date')->toArray();
        $total_passengers = $passengerData->pluck('total_passengers')->toArray();

        $passengerAmount = (new LarapexChart)->setType('bar')
            ->setTitle('Total Monthly Sold Ticket')
            ->setSubtitle('Current Month')
            ->setXAxis($passengerDates)
            ->setDataset([
                [
                    'name' => 'Amount',
                    'data' => $total_passengers
                ]
            ]);

        // Fetch data from the Income model for the current month
        $expenseData = Expense::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->groupBy('date')
            ->selectRaw('date, SUM(amount) as total_expenses')
            ->orderBy('date')
            ->get();

        // Extract dates and amounts from the fetched and aggregated data
        $expenseDates = $expenseData->pluck('date')->toArray();
        $total_expenses = $expenseData->pluck('total_expenses')->toArray();

        $expenseAmount = (new LarapexChart)->setType('bar')
            ->setTitle('Total Monthly Expense')
            ->setSubtitle('Current Month')
            ->setColors(['#FFC107', '#303F9F'])
            ->setXAxis($expenseDates)
            ->setDataset([
                [
                    'name' => 'Amount',
                    'data' => $total_expenses
                ]
            ]);


        return view('admin.index', compact('discounts', 'sellsAmount', 'passengerAmount', 'expenseAmount'));



        // echo "<pre>";
        // print_r($userRoles->toArray());

    }
}