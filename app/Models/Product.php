<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'qty', 'detail', 'product_type_id'];
    public $timestamps = false;

    public function productType(){
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }

}
