@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container">
    <a href="create" class="btn btn-success btn-rounded mb-4">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">nama Laptop</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($showdata as $data)
                <tr>
                    <th scope="row">{{$loop -> iteration}}</th>
                    <td>{{$data -> product_title}}</td>
                    <td><a href="{{'edit/' . $data -> product_slug}}" class="btn btn-info btn-rounded mb-4">Edit</a></td>
                    <td><a href="{{'delete/' . $data -> product_slug}}" class="btn btn-danger btn-rounded mb-4">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$showdata -> links()}}
    </div>
</div>

@endsection


<!-- 'edit/' . $data -> product_slug -->