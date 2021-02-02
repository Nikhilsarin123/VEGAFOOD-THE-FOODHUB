 @extends('layouts.admin_main')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Dishes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('dish.create') }}"> CREATE NEW DISH</a>
                 <a class="btn btn-info" href="dishshow">ADD CHANGES IN FRONTEND</a>
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
            <th>Image</th>
            <th>DishName</th>
            <th>RestaurantName</th>
            <th>Address</th>
            <th>Price</th>
            <th>Speciality</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($dishes as $dish)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/storage/{{ $dish->image }}"  height="100" width="100"></td>
            <td>{{ $dish->dishname }}</td>
            <td>{{ $dish->restaurant->Resname }}</td>
            <td>{{ $dish->restaurant->Address }}</td>
            <td>{{ $dish->price }}</td>
            <td>{{ $dish->Speciality }}</td>
            <td>
                <form action="{{ route('dish.destroy',$dish->id) }}" method="POST">
   
    
                    <a class="btn btn-primary" href="{{ route('dish.edit',$dish->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $dishes->links() !!}

 @endsection