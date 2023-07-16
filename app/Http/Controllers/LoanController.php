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
        $loans = DB::table('loans')
            ->join('orders', 'orders.user_id', '=', 'loans.user_id')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->select('*', 'orders.id as o_id')
            ->where('orders.user_id', Auth::user()->id)
            ->where('orders.status', 1)
            ->get();
        return view('loans.index', compact('loans'));
    }

    public function dashboard()
    {
        $this->authorize('create-update-delete-products');

        $loans = DB::table('loans')
            ->join('orders', 'orders.user_id', '=', 'loans.user_id')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.image_1', 'categories.name as c_name', 'products.name as p_name', 'products.id as p_id', 'rent_date', 'is_returned', 'orders.qty', 'loans.id')
            // ->where('orders.user_id', 'loans.user_id')
            ->paginate(7);
        return view('loans.dashboard', compact('loans'));
    }
}
