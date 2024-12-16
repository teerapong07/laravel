<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list(){
        return response()->json(['message' => 'Customers List']);
    }

    public function detail($id){
        return response()->json(['message' => 'Customer ' . $id]);
    }

    public function create(Request $request){
        return response()->json(['message' => 'Customer created' . $request->name]);
    }

    public function update(Request $request, $id){
        return response()->json(['message' => 'Customer updated ' . $id . ' ' . $request->name]);
    }

    public function delete($id){
        return response()->json(['message' => 'Customer deleted ' . $id]);
    }
}

