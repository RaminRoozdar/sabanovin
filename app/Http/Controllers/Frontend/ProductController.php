<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop()
    {
        $products = Product::paginate(10);
        return view('frontend.product.shop', compact('products'));
    }

    public function view($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::orderBy('created_at', 'desc')->take(10)->get();
        return view('frontend.product.view',compact('product','products'));
    }

    public function cart()
    {
        return view('frontend.product.cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "title" => $product->title,
                "quantity" => 1,
                "amount" => $product->amount,
                "count" => $product->count,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        session()->flash('color', 'success');
        session()->flash('message', 'محصول با موفقیت به سبد خرید اضافه شد.');
        return redirect()->back();

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('color', 'success');
            session()->flash('message', 'سبد خرید با موفقیت آپدیت شد.');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('color', 'success');
            session()->flash('message', 'محصول با موفقیت حذف شد.');
        }
    }

    public function test(Request $request)
    {
        $cart = session()->get('cart');
        dd($cart);
    }

}
