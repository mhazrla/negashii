<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::where('is_returned', 0)->where('user_id', Auth::user()->id)->with('product')->paginate(5);
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
            ->paginate(5);

        $returned = Loan::where('is_returned', 1)->get();
        $notReturned = Loan::where('is_returned', 0)->get();
        return view('loans.dashboard', compact('loans', 'returned', 'notReturned'));
    }

    public function returnItem(Loan $loan)
    {
        $loan =  Loan::findOrFail($loan->id);
        $product = Product::findOrFail($loan->product->id);
        $newQty = $product->qty + $loan->product->orders->qty;
        $product->update(['qty' => $newQty]);
        $loan->update(['is_returned' => 1]);

        return back()->with('status', 'Item has been returned.');
    }
}
