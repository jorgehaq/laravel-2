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
@php
@endphp




<div class="container">
    <div class="row">
        <div class="col-md-7 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Order View
                        <a href="{{ url('my-orders')}}" class="btn btn-warning text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Shipping Details</h4>
                            <label for="">First Name</label>
                            <div class="border">{{ $orders->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border">{{ $orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border">{{ $orders->email}}</div>
                            <label for="">Contact No.</label>
                            <div class="border">{{ $orders->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border">
                                {{ $orders->address1}}<br>
                                {{ $orders->address2}}<br>
                                {{ $orders->city}}<br>
                                {{ $orders->state}}<br>
                                {{ $orders->country}}
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border">{{ $orders->pincode}}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name}}</td>
                                            <td>{{ $item->qty}}</td>
                                            <td>{{ $item->price}}</td>
                                            <td class="h-4">
                                                <img src="{{ asset('assets/uploads/product/'.$item->products->image)}}" width="70" alt="imagen product here" >
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Grand Total: <span class="float-end">{{ $orders->total_price}}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
