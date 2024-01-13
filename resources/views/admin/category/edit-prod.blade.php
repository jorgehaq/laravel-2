@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Edit/update Category</h1>
    </div>
    <div class="card-body">
        <form role="form" class="text-start" action="{{ url("update-category/".$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $category->slug }}">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $category->description }}">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-check-label">Status</label>
            <input type="checkbox" class="form-check-input-outline" name="status" {{ $category->status=="1" ?'checked':'' }}  >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-check-label">Popular</label>
            <input type="checkbox" class="form-check-input-outline" name="popular" {{ $category->popular=="1" ?'checked':'' }} >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Meta Title</label>
            <input type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }}" >
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Meta Descripcion</label>
            <textarea type="text" class="form-control" name="meta_descrip">{{ $category->meta_descrip }}</textarea>
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Meta Keywords</label>
            <textarea class="form-control" name="meta_keywords">{{ $category->meta_keywords }}</textarea>
          </div>
          @if ($category->image!='')
            <img src="{{ asset('assets/uploads/category/'.$category->image)}}" class="cate-image" alt="Category image">
          @endif
          <div class="input-group input-group-outline my-3">
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
