@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 bg-white">
        
    </div> 

    <div class="col-12 bg-white">
        <div class="card">
            <div class="card-header bg-primary">
                <a href="{{ url('/tugas') }}">
                    <button class="btn btn-success float-left mr-2">Back</button>
                </a>
                <h2>Edit</h2>
            </div>
            <div class="card-body">
                <form action="{{'update/' . $data->product_slug}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Title</label>
                        <input type="text" class="form-control" value="{{$data->product_title}}" name="title">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Product Slug</label>
                        <input type="text" class="form-control" value="{{$data->product_slug}}" name="slug">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Product Image</label>
                          <input type="text" class="form-control" value="{{$data->product_image}}" name="image">
                      </div>
                      <input class="btn btn-primary float-right" type="submit" value="Simpan Data">
                </form>
            </div>
        </div>
    </div>

       
</div>  
@endsection