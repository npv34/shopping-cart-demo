<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart');
        return view('cart.index', compact('cart'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
        } else {
            $oldCart = null;
        }
        //khoi tao gio hang
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        //luu du lieu gio hang vao session
        Session::put('cart', $cart);
        return redirect()->route('cart.index');
    }


}
