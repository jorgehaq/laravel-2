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
                    <h4>Order View</h4>
                </div>
                <div class="card-body">d
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <div class="border p-2">{{ $orders->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{ $orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{ $orders->email}}</div>
                            <label for="">Contact No.</label>
                            <div class="border p-2">{{ $orders->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{ $orders->address1}}
                                {{ $orders->address2}}
                                {{ $orders->city}}
                                {{ $orders->state}}
                                {{ $orders->country}}
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{ $orders->pincode}}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{ $orders->lname}}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{ $orders->lname}}</div>

                        </div>
                        <div class="col-md-6">
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
    </div>
</div>


@endsection
