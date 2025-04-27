


@extends('layouts.app')

@section('title', 'index.blade.php')


@section('content')
<div class="container-header text-center py-3" style="background-color: rgba(230, 200, 250, 0.5);">
    <h1 class="display-5 font-weight-bold text-dark" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
        Product List
    </h1>
</div>

<div class="container mt-4">
    <div class="mt-4">
        <a href="{{ route('products.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle mr-2"></i> Create New Product
        </a>
    </div>

    <form action="{{ route('products.search')}}" method="GET">
        <div class="input-group" style="margin-right:5px">
            <div class="form-outline" data-mdb-input-init>
                <input type="text" class="form-control" name="search" placeholder="Search...." value="{{ request()->input('search') ? request()->input('search') : ''}}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <div class="mt-4">
        @session('success')
            <span class="alert alert-success text-3xl">{{ $value }}</span>
        @endsession
        @if(session('product_id_created'))
          <div class="mt-4">
                  <span class="fs-3 fw-bold text-primary">ID: {{ session('product_id_created') }}</span>
          </div>
        @endif

        @if(session('product_id_deleted'))
        <div class="mt-4">
                <span class="fs-3 fw-bold text-primary">ID: {{ session('product_id_deleted') }}</span>
        </div>
         @endif


    </div>
   <table class="table table-bordered table-striped mt-4">
    <thead class="table-dark">

        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Detail</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>

                 <form action="{{ route('products.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i> View
                    </a>

                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
   </table>
   <div class="d-flex custom-pagination fs-4">
         {{ $products->links('pagination::bootstrap-5') }}
   </div>
</div>

@endsection






