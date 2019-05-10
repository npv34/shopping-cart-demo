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
        Session::flash('success', 'Thêm sản phẩm khỏi giỏ hàng thành công');
        return redirect()->back();
    }

    public function removeProductIntoCart($productId)
    {
        $cart = Session::get('cart');
        $productsIntoCart = $cart->items;
        if (array_key_exists($productId, $productsIntoCart)) {
            //giam tong tien cac san pham
            $priceProDelete = $productsIntoCart[$productId]['price'];
            $cart->totalPrice -= $priceProDelete;
            //giam tong so luong san pham co trong gio hang
            $cart->totalQty--;
            unset($productsIntoCart[$productId]);

            //Cap nhat lai danh sach san pham trong gio hang
            $cart->items = $productsIntoCart;
            Session::put('cart', $cart);
            Session::flash('delete_success', 'Xóa sản phẩm khỏi giỏ hàng thành công');
        }

        return redirect()->back();
    }

}
