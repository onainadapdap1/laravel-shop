<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CheckoutController extends Controller
{
    public function index() {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true); // data product yang ditambahkan

        return view('frontend.checkout.index')
            ->with('cart_data', $cart_data)
        ;
    }
    public function storeorder(Request $request) {
        if(isset($_POST['place_order_btn'])) {
            return "I am here";
        }
    }
}
