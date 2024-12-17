@extends('layout')

@section('content')
    <h1>Product List</h1>
    <a href="/product/form" class="btn btn-primary">
        <i class="fa fa-plus"></i>
        Add Product
    </a>

    <form action="/product/search" method="post">
        @csrf
        <div class="input-group mb-3 mt-3">
            <input type="text" name="keyword" class="form-control" placeholder="Search Product" value="{{ $keyword ?? '' }}">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </form>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Detail</th>
                <th>Product Type</th>
                <th width="110px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>{{ $product->productType->name }}</td>
                    <td class="text-center">
                        <a href="/product/{{ $product->id }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/product/remove/{{ $product->id }}" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

