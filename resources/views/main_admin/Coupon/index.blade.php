@extends('layouts.admin_main')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Restaurant</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('coupon.create') }}"> Create new Coupons</a>
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
            <th>Coupon Code</th>
            <th>Coupon Type</th>
            <th>Percent_off</th>
            <th>value</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($coupons as $coupon)
        <tr>
            <td>{{$coupon->id}}</td>
            <td>{{ $coupon->code }}</td>
            <td>{{ $coupon->type }}</td>
            <td>{{ $coupon->percent_off}}</td>
            <td>{{ $coupon->value }}</td>
            <td>
                <form action="{{ route('coupon.destroy',$coupon->id) }}" method="POST">
                       
    
                    <a class="btn btn-primary" href="{{ route('coupon.edit',$coupon->id) }}">Edit</a>
   
                @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $coupons->links() !!}

 @endsection