@extends('layouts.front')

@section('title')
    Wellcome to E-Shop
@endsection

@section('content')

@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>Featured Products</h1>
            <div class="owl-carousel feacture-carousel owl-theme">
                @foreach ($feature_product as $item)
                <div class="item">
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
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>Trending Category</h1>
            <div class="owl-carousel feacture-carousel owl-theme">
                @foreach ($trending_category as $item)
                <div class="item">
                    <a href="{{ url('view-category/'.$item->slug)}}">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/category/'.$item->image)}}" width="200" height="200">
                            <div class="card-body">
                                <h5>{{$item->name}}</h5>
                                <p>{{$item->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
$('.feacture-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
</script>

@endsection
