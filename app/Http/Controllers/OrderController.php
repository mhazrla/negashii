<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $this->authorize('create-update-delete-orders');
        $orders = DB::table('orders')
            ->join('order_detail', 'order_detail.user_id', '=', 'orders.user_id')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->select('*', 'orders.user_id as id_user', 'orders.product_id as id_product', 'orders.qty as quantity', 'orders.day as days', 'orders.total_price as t_price',  'orders.id as o_id', 'products.id as p_id', 'products.name as p_name')
            ->where('orders.user_id', Auth::user()->id)
            ->where('order_detail.status', 0)
            ->get();
        return view('orders.index', compact('orders'));
    }

    public function dashboard()
    {
        $this->authorize('create-update-delete-products');
        $orders = DB::table('orders')
            ->join('order_detail', 'order_detail.user_id', '=', 'orders.user_id')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('*', 'orders.user_id as id_user', 'orders.product_id as id_product', 'orders.qty as quantity', 'orders.day as days', 'orders.total_price as t_price',  'orders.id as o_id', 'products.id as p_id', 'products.name as p_name')
            ->get();

        return view('orders.dashboard', compact('orders'));
    }

    public function store(Request $request)
    {
        $this->authorize('create-update-delete-orders');

        $product = Product::where('id', $request->product_id)->first();
        $total_price = $product->price * $request->day * $request->qty;
        $qtyNew = $request->qty;

        if ($product->qty !== 0) {
            $product->qty = $product->qty - $qtyNew;
            $product->save();
        }
        $order = Order::create(
            [
                'total_price' => $total_price,
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'day' => $request->day,
                'qty' => $request->qty,
            ]
        );

        $loan = Loan::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'rent_date' => Carbon::now(),
            'return_date' => Carbon::now()->addDays($request->day),
        ]);

        return to_route('order.index');
    }

    public function destroy(Order $order)
    {
        $this->authorize('create-update-delete-orders');
        $order =  Order::findOrFail($order->id);
        $order->delete();


        return back()->with('status', 'order has been deleted.');
    }

    public function checkout(Request $request)
    {
        $orderDetail = OrderDetail::create($request->all() + ['user_id' => Auth::user()->id]);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.secret_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $orderDetail->id,
                'gross_amount' => $orderDetail->total_price,
            ),
            'customer_details' => array(
                'email' => Auth::user()->email,
            ),
        );

        $orderDetailUpdate = OrderDetail::find($orderDetail->id);
        $orderDetailUpdate->update(['status' => 1]);


        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('Orders.checkout', compact('snapToken', 'orderDetail'));
    }
}
