<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $cart;

    /**
     * CartController constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::has('cart')){
            Session::set('cart', $this->cart);
        }
        return view('store.cart', ['cart' => Session::get('cart')]);
    }

    public function add($id)
    {
        $cart = $this->getCart();

        $product = Product::find($id);
        $cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);

        return redirect()->route('store.cart');
    }

   public function destroy($id){

       $cart = $this->getCart();

       $cart->remove($id);

       Session::set('cart', $cart);

       return redirect()->route('store.cart');

   }

    /**
     * @return Cart
     */
    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }

    //updates the quantity of an item on the cart
    public function updateQtyItem($id, $qty){

        $cart = $this->getCart();

        $cart->updateQtyItem($id, $qty);

        Session::set('cart', $cart);

        return redirect()->route('store.cart');

    }


}
