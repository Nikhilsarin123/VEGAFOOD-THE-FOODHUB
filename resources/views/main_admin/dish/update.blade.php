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
              <form role="form" action="{{ route('dish.update',$dish->id) }}" enctype="multipart/form-data" method="POST">
                 @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group @error('dishname') is-invalid @enderror">
                    <label for="exampleInputEmail1">DishName</label>
                    <input type="Text" class="form-control" id="exampleInputEmail1" name="dishname" value="dishname" placeholder="ResName">

                                @error('dishname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>

                   <div class="form-group @error('location') is-invalid @enderror">
                        <label>Select Restaurant</label>
                        <select name="restaurant_id" value="restaurant_id" class="form-control">
                              <option value="">--- Select restaurant ---</option>
                          @foreach(App\Restaurant::get() as $city)
                           <option value="{{ $city->id }}" >{{ $city->id }}||{{$city->Resname}}</option>
                          @endforeach
                        @error('Restaurantname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </select>
                      </div>

                    <div class="card-body">
                  <div class="form-group @error('Address') is-invalid @enderror">
                    <label for="exampleInputEmail1">price</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name= "price" placeholder="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>

                             
                  <div class="card-body pad">
              <div class="mb-3">
                
                <label for="exampleInputEmail1">Speciality</label>
                <input type="textarea"  name="Speciality" value="Speciality" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
              </div>

                  @error('Speciality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror         
          
            </div>

                                
                  <div class="form-group @error('image') is-invalid @enderror">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" value="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                     @error('Speciality')
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