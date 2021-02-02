<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Dish;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index()
    {
       $restaurants = Restaurant::latest()->paginate(5);
  
        return view('main_admin.restaurant.index',compact('restaurants'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main_admin.restaurant.create');
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
           $post = new restaurant;
           $post->Resname=$request->ResName;
           $post->location=$request->location;
           $post->Address=$request->Address;
           $post->Speciality=$request->Speciality;
           $post->image=$imagepath;
             $post->save();
         
         return redirect()->route('restaurant.index')
                        ->with('success','Restaurant created successfully.');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
         return view('main_admin.restaurant.show',compact('restaurant'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('main_admin.restaurant.update',compact('restaurant'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
       
          $imagepath= request('image')->store('uploads','public');
        $image=Image::make(public_path("storage/{$imagepath}"))->fit(1000,800);
        $image->save();

            $resInsert = Restaurant::where('id', $restaurant->id)->update([
                'Resname'=> $request->input('ResName'),
                'location'=> $request->input('location'),
                'Address'=> $request->input('Address'),
                'Speciality'=> $request->input('Speciality'),
                'image' =>  $imagepath
                
            ]);
         return redirect()->route('restaurant.index')->with('success','restaurant updated successfully.');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
      
      $restaurant->delete();
  
        return redirect()->route('restaurant.index')
                        ->with('success','restaurant deleted successfully');

            
        //
    }

    public function dish(Restaurant $restaurant)
    {
       
        return view('main_admin.addrestdish',compact('restaurant'));
    }

    public function restaurant_info($id)
    {
               $restaurant = Restaurant::find($id);
       
        return view('user.restaurant_info',compact('restaurant'));
    }


}
