<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
        'image',
        'quantity',
        'description',
        'category_id',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function InvoicesDetails()
    {
        return $this->hasMany(Product::class, 'product_id', 'id' );
    }
}
