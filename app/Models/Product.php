<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'ref', 'designation', 'gram_buying_price', 'gram_selling_price', 'gram_weight', 'max_discount', 'quantity', 'category_id', 'material_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function material() {
        return $this->belongsTo(Material::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
