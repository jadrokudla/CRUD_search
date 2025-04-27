


@extends('layouts.app')

@section('title', 'show.blade.php')


@section('content')
<div class="container-header text-center py-3" style="background-color: rgba(230, 200, 250, 0.5);">
    <h1 class="display-5 font-weight-bold text-dark" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
         Product view
    </h1>
</div>
<div class="container mt-4">

    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="btn btn-success">
            <i class="fas fa-back"></i> Back
        </a>
    </div>
    <div>
        @session('success')
            <span class="alert alert-success text-3xl">{{ $value }}</span>
        @endsession
    </div>
   <table class="table table-bordered table-striped mt-4">
    <thead class="table-dark">

        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $product->id}}</td>
            <td>{{ $product->name}}</td>
            <td>{{ $product->detail}}</td>

        </tr>
    </tbody>
   </table>
</div>

@endsection






