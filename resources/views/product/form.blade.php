@extends('layout')

@section('content')
    <h1>Product Form</h1>

    <form @if (isset($product)) action="/product/{{ $product->id }}" @else action="/product" @endif method="post">
        @csrf
        @if (isset($product))
            @method('PUT')
        @endif

        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name ?? '' }}">
        </div>
        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $product->price ?? '' }}">
        </div>
        <div class="form-group mb-3">
            <label for="qty">Qty</label>
            <input type="number" name="qty" id="qty" class="form-control" value="{{ $product->qty ?? '' }}">
        </div>
        <div class="form-group mb-3">
            <label for="detail">Detail</label>
            <textarea name="detail" id="detail" class="form-control">{{ $product->detail ?? '' }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="product_type_id">Product Type</label>
            <select name="product_type_id" id="product_type_id" class="form-control">
                @foreach ($productTypes as $productType)
                    <option value="{{ $productType->id }}" @if (isset($product) && $product->product_type_id == $productType->id) selected @endif   >
                        {{ $productType->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i>
            @if (isset($product))
                Update
            @else
                Save
            @endif
        </button>
    </form>
@endsection
