<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CheckoutController extends Controller
{
    public function index()
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true); // data product yang ditambahkan

        return view('frontend.checkout.index')
            ->with('cart_data', $cart_data);
    }
    public function storeorder(Request $request)
    {
        if (isset($_POST['place_order_btn'])) {
            // user data update
            $user_id = Auth::id();
            // return $user_id;
            $user = User::findOrFail($user_id);
            $user->name = $request->input('first_name');
            $user->lname = $request->input('last_name');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->pincode = $request->input('pincode');
            $user->phone = $request->input('phone_no');
            $user->alternate_phone = $request->input('alternate_no');
            $user->save();

            // placing order
            /*
                payment status =
                0 (pending)
                1 = cash accepted
                2 = canceled
                3 = continued for online
            */
            $track_no = rand(1111, 9999);
            $order = new Order();
            $order->user_id = $user_id;
            $order->tracking_no = 'fabcart'.$track_no;
            // $order->tracking_msg = ""
            $order->payment_mode = "Cash on delivery";
            // $order->payment_id = "";
            $order->payment_status = "0";
            $order->notify = "0";
            $order->save();

            $last_ordered_id = $order->id; //for order id in order_items

            // Ordered - cart items
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true); // data product yang ditambahkan
            $items_in_cart = $cart_data;

            foreach($items_in_cart as $itemdata) {
                $products =  Product::find($itemdata['item_id']);
                $pric_value = $products->offer_price;
                $tax_ant = $products->tax_ant;
                OrderItem::create([
                    'order_id'=> $last_ordered_id,
                    'product_id'=>$itemdata['item_id'],
                    'price'=>$pric_value,
                    'tax_ant'=> $tax_ant,
                    'quantity'=> $itemdata['item_quantity'],
                ]);
            }

            Cookie::queue(Cookie::forget('shopping_cart'));
            return redirect('/thank-you')->with('status', 'Order has been placed Successfully');
        }
    }
}
