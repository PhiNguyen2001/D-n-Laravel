<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $table = 'invoices_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'invoice_id',
        'prduct_id',
        'unit_price',
        'quantity',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }
    public function Product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
