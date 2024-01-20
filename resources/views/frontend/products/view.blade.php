@extends('layouts.front')

@section('title', $products->name)

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / {{ $products->category->name}} / {{ $products->name}}</h6>
    </div>
</div>


<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/product/'.$products->image)}}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $products->name}}
                        @if($products->trending=='1')
                            <label style="font-size: 14px;padding: 5px 15px 5px 15px; font-weight:bold;" class="float-end bagde bg-danger trending_tag text-white rounded font-weight-bold">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label class="me-3" for="">Original Price : <s>Rs {{ $products->original_price}}</s></label>
                    <label class="fw-bold" for="">Seling Price : Rs {{ $products->selling_price}}</label>
                    <p class="mt-3">
                        {!! $products->small_description !!}
                    </p>
                    <hr>

                    @if($products->qty>0)
                        <label class="bagde bg-success text-white rounded font-weight-bold " style="padding: 0px 10px 0px 10px; font-size: 11px;"> In Stock </label>
                    @else
                        <label class="bagde bg-danger text-white rounded font-weight-bold p-20" style="padding: 0px 10px 0px 10px; font-size: 11px;"> Out Stock </label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id" name="">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity " value="1" class="form-control w-25 mw-5 text-center qty-button" />
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br/>
                            <div class="col-md-12 mb-3">
                                <button type="button" class="btn btn-primary addToCartBtn me-3 float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 border-right">
                    <hr>
                    <p class="mt-3">
                        {!! $products->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    $(document).ready(function () {


        $('.addToCartBtn').click(function (e) {
            e.preventDefault();

            var product_id=$(this).closest('.product_data').find('.prod_id').val();
            var product_qty=$(this).closest('.product_data').find('.qty-button').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id':product_id,
                    'product_qty':product_qty,
                },
                success: function (response) {
                    swal(response.status);
                }
            });

            console.log(product_id);
            console.log(product_qty);
        });


        $('.increment-btn').click(function (e) {
            e.preventDefault();

            var inc_value=$('.qty-button').val();
            var value=parseInt(inc_value,10);
            value=isNaN(value)?'0':value;

            if(value<10){
                value++;
                $('.qty-button').val(value);
            }
        });
        $('.decrement-btn').click(function (e) {
            e.preventDefault();

            var inc_value=$('.qty-button').val();
            var value=parseInt(inc_value,10);
            value=isNaN(value)?'0':value;

            if(value>0){
                value--;
                $('.qty-button').val(value);
            }
        });
    });
</script>

@endsection
