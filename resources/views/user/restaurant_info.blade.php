@extends('layouts.user')

@section('content')
 <section id="home-section" class="hero">
      <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(/user_assets/images/bg_1.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

              <div class="col-md-12 ftco-animate text-center">
                <h1 class="mb-2">$restaurant->dish &amp; Fruits</h1>
                <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                <p><a href="#" class="btn btn-primary">View Details</a></p>
              </div>

            </div>
          </div>
        </div>

        <div class="slider-item" style="background-image: url(/user_assets/images/bg_2.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

              <div class="col-sm-12 ftco-animate text-center">
                <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
                <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                <p><a href="#" class="btn btn-primary">View Details</a></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>




  <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <li><a href="#" class="active">All</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruits</a></li>
                        <li><a href="#">Juice</a></li>
                        <li><a href="#">Dried</a></li>
                    </ul>
                </div>
            </div>
            <div class="row" inline="d-flex">
                @foreach ($restaurant->dish as $di)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{ url('dish_info/'.$di->id) }}" class="img-prod"><img class="img-fluid" src="/storage/{{$di->image}}" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{$di->dishname}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>${{$di->price}}</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="{{ url('dish_info/'.$di->id) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
            <form id="my_forms" action="{{route('cart.store')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$di->id}}">
                <input type="hidden" name="dishname" value="{{$di->dishname}}">
                <input type="hidden" name="price" value="{{$di->price}}">
          </form>
                                    <a href="javascript:{}" onclick="document.getElementById('my_forms').submit();" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                      @endforeach



  
            </div>
            <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
        </div>
    </section>



@endsection