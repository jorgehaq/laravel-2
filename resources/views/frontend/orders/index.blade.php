@extends('layouts.front')

@section('title')
 My Orders
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/')}}">Home</a> /
            <a href="{{ url('cart') }}">Cart</a>
        </h6>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-7 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4>My Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Traking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->tracking_no}}</td>
                                    <td>{{ $order->total_price}}</td>
                                    <td>{{ $order->status=='0'?'pending':'completed'}}</td>
                                    <td>
                                        <a href="{{ url('view-order/'.$order->id)}}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
