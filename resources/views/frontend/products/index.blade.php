@extends('layouts.front')

@section('title')
{{ $category->name }}
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>{{ $category->name;  }}</h1>
                @foreach ($products as $item)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/product/'.$item->image)}}" width="200" height="200">
                        <div class="card-body">
                            <h5>{{$item->name}}</h5>
                            <small class="float-start">{{$item->selling_price}}</small>
                            <small class="float-end"><s>{{$item->original_price}}</s></small>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>

@endsection
