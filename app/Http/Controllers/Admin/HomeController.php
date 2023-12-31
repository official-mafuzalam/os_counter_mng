<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $discounts = Discount::all();

        return view('admin.index', compact('discounts'));



        // echo "<pre>";
        // print_r($userRoles->toArray());

    }
}