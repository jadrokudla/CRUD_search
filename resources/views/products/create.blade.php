@extends('layouts.app')

@section('title', 'create.blade.php')

@section('content')


<div class="container mt-5">
    <div class="container-header text-center" style="background-color: rgba(230, 200, 250, 0.5);">
         <h1>Product create</h1>
    </div>

    <div>
        <a href="{{ route('products.index') }}" class="btn btn-sm btn-secondary">
            <i class="fa fa-backward"></i> Back
        </a>
    </div>


    <form action="{{ route('products.store')}}" method="POST">
        @csrf

            <div>
                <label for="product_name" >Name</label>
                <input type="text" name="name" class="form-control" placeholder="name...">
                @error('name')
                <span class="text-danger" style="color: #dc3545; font-size: 40px;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="produce_detail" >Detail</label>
                <input type="text" name="detail" class="form-control" placeholder="detail...">
                @error('detail')
                <span class="text-danger" style="color: #dc3545; font-size: 40px;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
    </form>

</div>


@endsection
