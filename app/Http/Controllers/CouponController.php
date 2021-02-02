<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Cart;

class CouponController extends Controller
{
    //
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $coupons = Coupon::latest()->paginate(5);
  
        return view('main_admin.Coupon.index',compact('coupons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       return view('main_admin.Coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
       
           $post = new Coupon;
           $post->code=$request->namecode;
           $post->type=$request->type;
           if($request->type=='percent_off')
           {
             $post->percent_off=$request->percentoff;
           }
           else
           {
            $post->value=$request->value;
           }
           $post->save();
         
         return redirect()->route('coupon.index')
                        ->with('success','Coupon created successfully.');
         
         


     }
     
     public function apply(Request $request)
     {

        $coupon = Coupon::where('code',$request->coupon_code)->first();
      
             if(!$coupon)
                {
                     return redirect()->route('cart.index')->withErrors(['error' => 'Invalid coupon code.please try again!']);
                }  

                session()->put('coupon',[
                
                'name' => $coupon->code,
                'discount' => $coupon->discount(Cart::subtotal()),
                ]);      

                return redirect()->route('cart.index')->withErrors(['error' => 'coupon has been applied']);
     }
        




    public function edit(Coupon $coupon)
    {

        return view('main_admin.Coupon.update',compact('coupon'));

        //
    }


      public function update(Request $request, Coupon $coupon)
    {
          if($request->type=='percent_off')
           { 

           $upInsert = Coupon::where('id', $coupon->id)->update([
           'code'=>$request->namecode,
           'type'=>$request->type,
           'percent_off'=>$request->percentoff,
             ]);
           }
           else
           {
            $upInsert = Coupon::where('id', $coupon->id)->update([
           'code'=>$request->namecode,
           'type'=>$request->type,
            'value'=>$request->value,
            ]);
         
           }

       
                
         
         return redirect()->route('coupon.index')
                        ->with('success','Coupon updated successfully.');
    }

     public function destroy( Coupon $coupon)
    {
        //

    $coupon->delete();
     return redirect()->route('coupon.index')
                        ->with('success','Coupon deleted successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroyer()
    {
        //
            session()->forget('coupon');
    return redirect()->route('cart.index')->withErrors(['error' => 'coupon has been removed']);
    }

}
