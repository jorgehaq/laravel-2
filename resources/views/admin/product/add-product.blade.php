@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Add Product</h1>
    </div>
    <div class="card-body">
        <form role="form" class="text-start" action="{{ url("insert-product")}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="input-group input-group-outline my-3 is-filled">
            <label class="form-label">Category</label>
            <select class="form-control" name="cate_id">
                <option value="">Select a category</option>
                @foreach ($category as $item)
                    <option value="{{$item->id}}">{{ $item->name}}</option>
                @endforeach
              </select>
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Small Description</label>
            <input type="text" class="form-control" name="small_description">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Original Price</label>
            <input type="number" class="form-control" name="original_price">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Selling Price</label>
            <input type="number" class="form-control" name="selling_price">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Tax</label>
            <input type="number" class="form-control" name="taxs">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" name="qty">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-check-label">Status</label>
            <input type="checkbox" class="form-check-input-outline" name="status">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-check-label">Trending</label>
            <input type="checkbox" class="form-check-input-outline" name="trending">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Meta Title</label>
            <input type="text" class="form-control" name="meta_title">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Meta Descripcion</label>
            <textarea type="text" class="form-control" name="meta_description"></textarea>
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Meta Keywords</label>
            <textarea type="text" class="form-control" name="meta_keywords"></textarea>
          </div>
          <div class="input-group input-group-outline my-3 is-filled">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
          </div>
          <div class="mt-4 text-sm text-center">
            <button type="submit" class="text-primary text-gradient font-weight-bold">Submit</button>
          </div>
        </form>
    </div>
</div>

@endsection
