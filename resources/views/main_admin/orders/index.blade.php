    @extends('layouts.admin_main')

    @section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Order</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href=" ">TOTAL ORDER TILL NOW ::({{App\Order::count()}})</a>
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
            <th>billing_name</th>
            <th>billing_country</th>
            <th>billing_city</th>
            <th>billing_address</th>
            <th>billing_zip</th>
            <th>billing_phone</th>
            <th>billing_email</th>
            <th>billing_discount</th>
            <th>billing_discount_code</th>
            <th>billing_subtotal </th>
            <th>billing_tax</th>
            <th>billing_total</th>
            <th>payment_gateway</th>
            <th>shipped</th>
            <th>error </th>

            <th width="250px">Action</th>
        </tr>
        @foreach($orders as $order))
        <tr>
            <td>{{$order->id}}</td>
            <td>{{ $order->billing_name }}</td>
            <td>{{ $order->billing_country }}</td>
            <td>{{ $order->billing_city }}</td>
            <td>{{ $order->billing_address }}</td>
            <td>{{ $order->billing_zip }}</td>
            <td>{{ $order->billing_phone }}</td>
            <td>{{ $order->billing_email }}</td>
            <td>{{ $order->billing_discount }}</td>
            <td>{{ $order->billing_discount_code }}</td>
            <td>{{ $order->billing_subtotal }}</td> 
            <td>{{ $order->billing_tax }}</td>
            <td>{{ $order->billing_total }}</td>
            <td>{{ $order->payment_gateway }}</td>
            <td>{{ $order->shipped }}</td>
            <td>{{ $order->error }}</td>
            <td>
                <form action="" method="POST">
                    <a class="btn btn-info" href="">Show</a>
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $orders->links() !!}
    @endsection