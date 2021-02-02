@extends('layouts.admin_main')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Restaurant</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('restaurant.create') }}"> Create new Restaurants</a>
                <a class="btn btn-info" href="dishshow">ADD CHANGES IN FRONTEND</a>
                  <a class="btn btn-primary" href="{{ route('dish.create') }} ">adddish</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>image</th>
            <th>Restaurants</th>
            <th>location</th>
            <th>Address</th>
            <th>speciality</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{$restaurant->id}}</td>
            <td><img src="/storage/{{ $restaurant->image }}" height="100" width="100"></td>
            <td>{{ $restaurant->Resname }}</td>
            <td>{{ $restaurant->location }}</td>
            <td>{{ $restaurant->Address }}</td>
            <td>{{ $restaurant->Speciality }}</td>
            <td>
                <form action="{{ route('restaurant.destroy',$restaurant->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('restaurant.edit',$restaurant->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $restaurants->links() !!}

 @endsection