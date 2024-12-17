<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductType;

class ProductController extends Controller
{
    public function list(){
        try{
            $products = Product::all();
            return view('product.list', compact('products'));
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function form(){
        $productTypes = ProductType::orderBy('name', 'asc')->get();
        return view('product.form', compact('productTypes'));
    }

    public function save(Request $request){
        try{
            Product::create($request->all());
            return redirect('/product/list');
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($id){
        try{
            $product = Product::find($id);
            $productTypes = ProductType::orderBy('name', 'asc')->get();
            return view('product.form', compact('product', 'productTypes'));
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id){
        try{
            $product = Product::find($id);
            $product->update($request->all());
            return redirect('/product/list');
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function remove($id){
        try{
            Product::find($id)->delete();
            return redirect('/product/list');
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function search(Request $request){
        $keyword = $request->keyword;

        if(strlen($keyword) > 0){
            $products = Product::where('name', 'like', '%'.$keyword.'%')->get();
        }else{
            $products = Product::all();
        }

        return view('product.list', compact('products', 'keyword'));
    }

    public function sort(){
        $sort = 'desc';
        $products = Product::orderBy('price', $sort)->get();

        return view('product.list', compact('products', 'sort'));
    }
    
    public function priceMoreThan($price = 800){
        $products = Product::where('price', '>', $price)->get();

        return view('product.list', compact('products'));
    }

    public function priceLessThan($price = 800){
        $products = Product::where('price', '<', $price)->get();

        return view('product.list', compact('products'));
    }

    public function priceBetween($min = 800, $max = 1000){
        $products = Product::whereBetween('price', [$min, $max])->get();

        return view('product.list', compact('products'));
    }

    public function priceNotBetween($min = 800, $max = 1000){
        $products = Product::whereNotBetween('price', [$min, $max])->get();

        return view('product.list', compact('products'));
    }

    public function priceIn($prices = [800, 1000]){
        $products = Product::whereIn('price', $prices)->get();

        return view('product.list', compact('products'));
    }

    public function priceNotIn($prices = [800, 1000]){
        $products = Product::whereNotIn('price', $prices)->get();

        return view('product.list', compact('products'));
    }

    public function priceMaxCountAvg(){
        $priceMax = Product::max('price');
        $priceMin = Product::min('price');
        $priceCount = Product::count('price');
        $priceAvg = Product::avg('price');

        return view('product.max-min-count-avg', compact('priceMax', 'priceMin', 'priceCount', 'priceAvg'));
    }

    public function productTypeList(){
        $productTypes = ProductType::orderBy('name', 'asc')->get();

        return view('product.product-type-list', compact('productTypes'));
    }

    public function listByProductType($productTypeId){
        $productType = ProductType::find($productTypeId);

        return view('product.list-by-product-type', compact('productType'));
    }

}
