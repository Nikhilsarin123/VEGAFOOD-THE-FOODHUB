@extends('layouts.user')

@section('content')

 <div class="hero-wrap hero-bread" style="background-image: url('/user_assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
        <div class="container">
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="page-header">Checkout</h1>
            <h3>Your total: Rs {{$newTotal}}</h3>
             @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
             <p><a href="/dishshow" class="btn btn-primary py-3 px-4">Continue Shopping</a></p>
        </div>
              @endif
            <div id="checkout-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
                {{ Session::get('error') }}
            </div>
            <form action="{{ route('checkout') }}" method="post" id="checkout-form2">
                 @csrf
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" id="address" class="form-control" name="address" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Card Holder Name:</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-number">Credit card number:</label>
                            <input type="text" id="card-number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="card-expiry-month">Expiration month:</label>
                                    <input type="text" id="card-expiry-month" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="card-expiry-year">Expiration year:</label>
                                    <input type="text" id="card-expiry-year" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-cvc">CVC:</label>
                            <input type="text" id="card-cvc" class="form-control" required>
                        </div>
                    </div>
                </div>

        </div>

    </div>
</div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
                        <form action="#" class="billing-form">
                            <h3 class="mb-4 billing-heading">Billing Details</h3>
                <div class="row align-items-end">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname" >Full Name</label>
                      <input type="text" name="billing_name" class="form-control" placeholder="">
                    </div>
                  </div>
                <div class="w-100"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="country">State / Country</label>
                            <div class="select-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="billing_country" id="" class="form-control">
                            <option value="France">France</option>
                            <option value="Italy">Italy</option>
                            <option value="Philippines">Philippines</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Hongkong">Hongkong</option>
                            <option value="Japan">Japan</option>
                          </select>
                        </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="streetaddress">Street Address</label>
                      <input type="text" name ="billing_address"class="form-control" placeholder="House number and street name">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                      <input type="text" name ="billing_nearby "class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
                    </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="towncity">Town / City</label>
                      <input type="text" name="billing_city"class="form-control" placeholder="">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="postcodezip">Postcode / ZIP *</label>
                      <input type="text" name="billing_zip"class="form-control" placeholder="">
                    </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                      <input type="text" class="form-control" name="billing_phone" placeholder="">
                    </div>
                  </div>
                  <input type="hidden"  name="billing_discount"      value="{{$discount}} ">
                  <input type="hidden"  name="billing_discount_code" value="{{ session()->get('coupon')['name']}}">
                  <input type="hidden"  name="billing_subtotal"      value="{{$newSubTotal}}">
                  <input type="hidden"  name="billing_tax"           value="{{$newTax}}">
                  <input type="hidden"  name="billing_total"         value="{{$newTotal}} ">
                  <input type="hidden"  name="billing_quantity"         value=" ">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="emailaddress">Email Address</label>
                      <input type="text" name ="billing_email" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="form-group mt-4">
                                        <div class="radio">
                                          <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                                          <label><input type="radio" name="optradio"> Ship to different address</label>
                                        </div>
                                    </div>
                </div>
                </div>
          <!-- END -->
                    </div>
                    <div class="col-xl-5">
              <div class="row mt-5 pt-3">
                <div class="col-md-12 d-flex mb-5">
                    <div class="cart-detail cart-total p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Cart Total</h3>
                        <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>{{Cart::subtotal()}}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Discount</span>
                                    <span>-Rs:{{$discount}}</span>
                                </p>
                                <hr>
                                 <p class="d-flex">
                                    <span>New Subtotal</span>
                                    <span>  Rs:{{$newSubTotal}}*</span>
                                </p>
                                
                                <p class="d-flex">
                                    <span>Delivery</span>
                                    <span>+Rs:{{$delivery}}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Tax</span>
                                    <span>+Rs:{{$newTax}}</span>
                                </p>

                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span>| Rs:{{$newTotal}}*</span>
                                </p>
                                </div>
                </div>
                <div class="col-md-12">
                    <div class="cart-detail p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Payment Method</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                               <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                               <label><input type="radio" name="Payment" value="Paypal" class="mr-2"> Paypal</label>
                                                <label><input type="radio" name="payment" value="stripe" class="mr-2">stripe</label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                               <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-primary py-3 px-4" >Place an order</button> 
                                </div>
                </div>
              </div>
          </div> <!-- .col-md-8 -->
           </form>
        </div>
      </div>
    </section> <!-- .section -->

@endsection  