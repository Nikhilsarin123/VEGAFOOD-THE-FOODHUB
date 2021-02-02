@extends('layouts.user')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('/user_assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
            <div class="container">
                  @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
      @if ($message = Session::get('successm'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
  <p><a href="/dishshow" class="btn btn-primary py-3 px-4">Continue Shopping</a></p>
     @if (Cart::count()>0)
        <div class="alert alert-success">
            <p>{{Cart::count()}} item(s) in your order Cart </p>
        </div>

                <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                              <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total=0;
                                ?>
                        @foreach(Cart::content() as $item )
                              <tr class="text-center">
                                <form id="my_form" action="{{route('cart.destroy',$item->rowId)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <td class="product-remove"><a href="javascript:{}"  onclick="document.getElementById('my_form').submit();"><span class="ion-ios-close" ></span></a></td>
                                </form>
                                <td class="image-prod"><div class="img" style="background-image:url(user_assets/images/product-3.jpg);"></div></td>
                                
                                <td class="product-name">
                                    <h3>{{$item->dishname}}</h3>
                                    <p>Far far away, behind the word mountains, far from the countries</p>
                                </td>
                                
                                <td class="price">RS: {{$item->price}}</td>

                                <?php
                                  $subtotal= $item->price*1;
                                      
                                ?>

                                <?php $total=$total+$subtotal;?>
                                
                                <td class="quantity">
                                    <div class="input-group mb-3">
                                    <input type="number" class="quantity" data-id="{{$item->rowId}}"name="quantity" class="quantity form-control input-number" value="{{$item->qty}}" min="1" max="100">
                                </div>
                              </td>
                                
                                <td class="total">RS: {{$item->price*$item->qty}}</td>
                              </tr><!-- END TR-->
                                @endforeach
                            </tbody>
                          </table>
                      </div>
                </div>
            </div>
            @if( $errors->any() )
<span class="alert alert-info" text="red"> {{$errors->first()}} </span>
@endif
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        @if(!session()->has('coupon'))
                        <h3>Coupon Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <form action="{{route('coupon.apply')}}" class="info" method="POST"  id="coupon_form">
                            @csrf
                  <div class="form-group">
                   
                    <label for="">Coupon code</label>
                    <input type="text" class="form-control text-left px-3" name="coupon_code" id="coupon_code" placeholder="">

                  </div>
                    @endif
                    </div>
                 
                   @if(!session()->has('coupon'))
                 
                    <p><a href="javascript:{}"  onclick="document.getElementById('coupon_form').submit();" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
                    @endif
                </div>
             
                  </form>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Estimate shipping and tax</h3>
                        <p>Enter your destination to get a shipping estimate</p>
                        <form action="#" class="info">
                  <div class="form-group">
                    <label for="">Country</label>
                    <input type="text" class="form-control text-left px-3" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="country">State/Province</label>
                    <input type="text" class="form-control text-left px-3" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="country">Zip/Postal Code</label>
                    <input type="text" class="form-control text-left px-3" placeholder="">
                  </div>
                </form>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>Rs:{{Cart::subtotal()}}</span>
                        </p>
        
                        @if(session()->has('coupon'))
                         <form action="/coupon_delete" method="POST" id=del_form>
                                @csrf
                                  @method('DELETE')
                                  </form>
                        <p class="d-flex">
                            <span>Discount({{ session()->get('coupon')['name']}}):</span>
                            <span>-Rs:{{ $discount}}:<a class="product-remove" href="javascript:{}"  onclick="document.getElementById('del_form').submit();">Remove</a> </span>
                        </p>
                        <hr>
                         <p class="d-flex">
                            <span>New Subtotal</span>
                            <span>Rs:{{$newSubTotal}}*</span>
                        </p>
                        @endif
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>+Rs:{{$delivery}}</span>
                        </p>
                        <p class="d-flex">
                            <span>TAX</span>
                            <span>+Rs:{{$newTax}}</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>| Rs:{{$newTotal}}*</span>
                        </p>
                    </div>
                    <p><a href="{{route('checkout.index')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                    @else
                         
                           <div class="alert alert-success">
            <p>NO item in your order Cart !</p>
           
        </div>


                    @endif
                </div>
            </div>
            </div>
        </section>
            
@endsection            


            