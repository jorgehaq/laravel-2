@extends('layouts.front')

@section('title')
{{ $category->name }}
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>{{ $category->name;  }}</h1>
            @foreach ($products as $prod)
            <div class="col-md-3 mb-3">
                <a href="{{ url('category/'.$category->name.'/'.$prod->slug)}}">
                <div class="card">
                    <img src="{{ asset('assets/uploads/product/'.$prod->image)}}" width="200" height="200">
                    <div class="card-body">
                        <h5>{{$prod->name}}</h5>
                        <small class="float-start">{{$prod->selling_price}}</small>
                        <small class="float-end"><s>{{$prod->original_price}}</s></small>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
