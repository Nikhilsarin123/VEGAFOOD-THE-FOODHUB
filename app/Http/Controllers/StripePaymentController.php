<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

use Stripe\Error\Card;
Use Cart;
use App\Order;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use App\OrderDish;
class StripePaymentController extends Controller
{


 public function postCheckout(Request $request) {


        dd(Cart::subtotal());
        $tax =config('cart.tax')/100;
        $delivery = 50;
        $discount = session()->get('coupon')['discount']??0;
        $newSubTotal = (Cart::subtotal() - $discount ); 
        $newTax =$newSubTotal * (1+ $tax);
        $newTotal = $newSubTotal +   $newTax +  $delivery;
        $fullname = $request->billing_name;
        $email = $request->billing_email;
        $country = $request->billing_country;
        $address = $request->billing_address;
        $zip =  $request->billing_zip;
        $item=Cart::count();


       
     try {

        Stripe::setApiKey('sk_test_fX4ZPSatRKdu4AOC5oxZG0ld00aEuHNSQ6');
        $customer = Customer::create(array(
            'name' =>$fullname,
            'description' => 'test description',
            'email' => $email,
            'source' => $request->input('stripeToken'),
            "address" => ["city" => $address, "country" => $country, "line1" => "42", "line2" => "", "postal_code" => $zip  , "state" => $address],
        ));
         $charges = Charge::create(array(
                "customer" => $customer->id,
                "amount" =>$newTotal * 100,
                "currency" => "INR",
                "description" => "Test Charges",
            ));


        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        $order =  Order::create([
              'user_id' => Auth()->user() ? auth()->user()->id: null,
               'billing_name' => $request->billing_name, 
               'billing_country' => $request->billing_country,
                'billing_address' => $request->billing_address,
                'billing_city' => $request->billing_city,
                'billing_zip' => $request->billing_zip,   
                'billing_email' => $request->billing_discount,
                'billing_discount_code' => $request->billing_discount_code, 
                'billing_subtotal' => $request->billing_subtotal,  
                'billing_phone' => $request->billing_phone,
                'billing_email' => $email,
                'billing_quantity'=>$item,
                'billing_tax' => $request->billing_tax, 
                'billing_total' => $request->billing_total, 
                'payment_gateway' => $request->payment, 
                'error' => null,  
                     ]);


        
        foreach (Cart::content() as $item) {
        OrderDish::create([
            'order_id' =>$order->id,
            'dish_id'  =>$item->model->id,
            'quantity' =>$item->qty,
        ]);
     
        }



       
                 Cart::instance('default')->destroy();
                 session()->forget('coupon');


           return redirect()->route('checkout.index')->with('success','Successfully purchased products!');

    }
  
   //
}
