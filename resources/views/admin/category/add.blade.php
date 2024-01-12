@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Add Category</h1>
    </div>
    <div class="card-body">
        <form role="form" class="text-start" action="{{ url("insert-category")}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-check-label">Status</label>
            <input type="checkbox" class="form-check-input-outline" name="status">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-check-label">Popular</label>
            <input type="checkbox" class="form-check-input-outline" name="popular">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Meta Title</label>
            <input type="text" class="form-control" name="meta_title">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Meta Descripcion</label>
            <input type="text" class="form-control" name="meta_descrip">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Meta Keywords</label>
            <input type="text" class="form-control" name="meta_keywords">
          </div>
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
