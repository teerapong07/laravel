@extends('layout')

@section('content')
    <h1>Product Max Min Count Avg</h1>
    
    <p>Max Price: {{ $priceMax }}</p>
    <p>Min Price: {{ $priceMin }}</p>
    <p>Count Price: {{ $priceCount }}</p>
    <p>Avg Price: {{ $priceAvg }}</p>
@endsection