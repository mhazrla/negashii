<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index()
    {
        $loans = DB::table('orders')
            ->join('order_detail', 'order_detail.user_id', '=', 'orders.user_id')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->select('*', 'orders.user_id as id_user', 'orders.product_id as id_product', 'orders.qty as quantity', 'orders.day as days', 'orders.total_price as t_price',  'orders.id as o_id', 'products.id as p_id', 'products.name as p_name')
            ->where('orders.user_id', Auth::user()->id)
            ->where('order_detail.status', 1)
            ->get();
        return view('loans.index', compact('loans'));
    }

    public function dashboard()
    {

        $loans = Loan::get();
        return view('loans.dashboard', compact('loans'));
    }
}
