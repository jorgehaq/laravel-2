@extends('layouts.front')

@section('title')
    Cart
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h1>All Categories</h1>
                    @foreach ($category as $item)
                        <div class="col-md-3 mb-3">
                            <a href="{{ url('category/'.$item->slug)}}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'.$item->image)}}" alt="Category here">
                                    <div class="card-body">
                                        <h5>{{$item->name}}</h5>
                                        <p>{{ $item->description}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

