@extends('layouts.admin_main')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dish Specification</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('coupon.update',$coupon->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group @error('ResName') is-invalid @enderror">
                    <label for="exampleInputEmail1">Coupon Code</label>
                    <input type="Text" class="form-control" id="exampleInputEmail1" name="namecode">

                                @error('ResName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>

                   <div class="form-group @error('location') is-invalid @enderror">
                        <label>Coupon Type</label>
                        <select name="type" value="location" class="form-control" placeholder="{{$coupon->type}}" >
                          <option value="percent_off">Percent off</option>
                          <option value="fixed">Flat</option>
                        </select>
                        @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>

                    <div class="card-body">
        
                    
                  <div class="form-group @error('Address') is-invalid @enderror">
                    <label for="exampleInputEmail1">percent_off</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name= "percentoff" placeholder="{{$coupon->percent_off}}">

                                @error('Address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                
                
                   
                    <div class="form-group @error('Address') is-invalid @enderror">
                    <label for="exampleInputEmail1">Value</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name= "value" placeholder="Address" placeholder="{{$coupon->value}}">

                                @error('Address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            
              @endsection