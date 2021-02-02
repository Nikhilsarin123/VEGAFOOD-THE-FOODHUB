<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tax =config('cart.tax')/100;
        $delivery = 50;
        $discount = session()->get('coupon')['discount']??0;
        $newSubTotal = (Cart::subtotal() - $discount ); 
        $newTax =$newSubTotal * (1+ $tax);
        $newTotal = $newSubTotal +   $newTax +  $delivery;
       return view('user.cart')->with([
        'discount' => $discount,
        'delivery' => $delivery,
        'newSubTotal' => $newSubTotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
         $data=Cart::subtotal();
           
              print_r("($data)******************************************") ;
        $duplicate= Cart::search(function($cartItem,$rowId) use ($request)
        {
            return $cartItem->id === $request->id;
        });

        if($duplicate->isNotEmpty())
        {
           return redirect()->route('cart.index')->with('success','item is already in your cart');
        } 


        Cart::add($request->id,$request->dishname,1,$request->price)->associate('App\Dish');
        return redirect()->route('cart.index')->with('success','Item was added to your cart');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       if($request->quantity < 2000)
       {
        Cart::update($id, $request->quantity);
        session()->flash('successm','quantity was updated succesfully');
        return response()->json(['success'=> true]);
       }
       else
       {
        return redirect()->route('cart.index')->with('success','sorry you cant order more than 5 item');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cart::remove($id);
        return back()->with('success','item has been removed! ');
    }
}
