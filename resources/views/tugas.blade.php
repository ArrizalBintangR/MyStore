@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container">
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
                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


<!-- 'edit/' . $data -> product_slug -->