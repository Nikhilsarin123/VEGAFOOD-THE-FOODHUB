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
              <form role="form" action="{{ route('restaurant.update',$restaurant->id) }}" enctype="multipart/form-data" method="POST">
                 @csrf
                  @method('PATCH')
                <div class="card-body">
                  <div class="form-group @error('ResName') is-invalid @enderror">
                    <label for="exampleInputEmail1">Restaurant Name</label>
                    <input type="Text" class="form-control" id="exampleInputEmail1" name="ResName" value=" ResName" placeholder="ResName">

                                @error('ResName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>

                   <div class="form-group @error('location') is-invalid @enderror">
                        <label>Select location</label>
                        <select name="location" value="location" class="form-control">
                          <option>Delhi</option>
                          <option>Punjab</option>
                          <option>Haryana</option>
                          <option>Mumbai</option>
                          <option>Kerale</option>
                        </select>
                        @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>

                    <div class="card-body">
                  <div class="form-group @error('Address') is-invalid @enderror">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="Text" class="form-control" id="exampleInputEmail1" name= "Address" placeholder="Address">

                                @error('Address')
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