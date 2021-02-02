<?php

namespace App\Http\Controllers;
use App\Restaurant;
use App\Dish;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
         $dishes = Dish::latest()->paginate(5);
  
        return view('main_admin.dish.index',compact('dishes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main_admin.dish.create');
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
            
        $imagepath= request('image')->store('uploads','public');
        $image=Image::make(public_path("storage/{$imagepath}"))->fit(1000,800);
        $image->save();
           $post = new dish;
           $post->dishname=$request->dishname;
           $post->price=$request->price;
           $post->Speciality=$request->Speciality;
           $post->restaurant_id=$request->restaurant_id;
           $post->image=$imagepath;
           $post->save();
         
         return redirect()->route('dish.index')
                        ->with('success','Blog created successfully.');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */

    public function dishshow()
    {
       
        $restaurant = Restaurant::latest()->paginate(8);
  
        return view('user.user_home',compact('restaurant'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        //     

    }



     public function dish_info($id)
    {
       
       $dish = Dish::find($id);
       
        return view('user.dish_info',compact('dish'));

    }


        
    public function cart_info($id)
    {
        $dishes = DB::table('dishes')->where('id', $id)->get();
         

         return view('user.cart')->with('dishes', $dishes);

       

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
         return view('main_admin.dish.update',compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $data = $request->all();
        $imagepath= request('image')->store('uploads','public');
        $image=Image::make(public_path("storage/{$imagepath}"))->fit(1000,800);
        $image->save();

       $resInsert = Dish::where('id', $dish->id)->update([
                 'dishname'=>$request->dishname,
                 'price'=>$request->price,
                 'Speciality'=>$request->Speciality,
                 'restaurant_id'=>$request->restaurant_id,
                 'image'=>$imagepath,
                
            ]);
         return redirect()->route('dish.index')->with('success','dish updated successfully.');


  



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //

      $dish->delete();
  
        return redirect()->route('dish.index')
                        ->with('success','dish deleted successfully');

    }
    
}
