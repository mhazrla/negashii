<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Loan;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('products.index', compact('products'));
    }

    public function dashboard()
    {
        $this->authorize('create-update-delete-products');

        $products = Product::latest()->with('category')->paginate(10);
        $orders = OrderDetail::where('status', 1)->get();
        $loans = Loan::get();
        $customers = User::where('role_id', 2)->get();

        return view('products.dashboard', compact(['products', 'orders', 'loans', 'customers']));
    }

    public function create()
    {
        $this->authorize('create-update-delete-products');

        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $this->authorize('create-update-delete-products');

        $validator = $request->validated();
        if ($request->has('image_1')) {
            $validator['image_1'] = $request->file('image_1')->store('products');
        }

        if ($request->has('image_2')) {
            $validator['image_2'] = $request->file('image_2')->store('products');
        }

        if ($request->has('image_3')) {
            $validator['image_3'] = $request->file('image_3')->store('products');
        }

        $product = Product::create(
            $validator
        );

        return to_route('product.dashboard')->with('status', 'New product has been added.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $this->authorize('create-update-delete-products');

        $categories = Category::get();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $this->authorize('create-update-delete-products');

        if ($request->has('image_1')) {
            !is_null($product->image_1) && Storage::delete($product->image_1);
            $product->image_1 = $request->file('image_1')->store('products');
        }
        if ($request->has('image_2')) {
            !is_null($product->image_2) && Storage::delete($product->image_2);
            $product->image_2 = $request->file('image_2')->store('products');
        }
        if ($request->has('image_3')) {
            !is_null($product->image_3) && Storage::delete($product->image_3);
            $product->image_3 = $request->file('image_3')->store('products');
        }
        $product->update($request->validated() + [
            'image_1' => $product->image_1,
            'image_2' => $product->image_2,
            'image_3' => $product->image_3,
        ]);

        return to_route('product.dashboard')->with('status', 'Product has been updated.');
    }

    public function destroy(Product $product)
    {
        $this->authorize('create-update-delete-products');

        Storage::delete($product->image_1);
        if ($product->image_2) {
            Storage::delete($product->image_2);
        }
        if ($product->image_3) {
            Storage::delete($product->image_3);
        }
        $product->delete();

        return back()->with('status', 'Product has been deleted.');
    }
}
