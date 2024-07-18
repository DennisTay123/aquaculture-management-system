<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'inventories';

    // Primary key
    protected $primaryKey = 'id';

    // Attributes that are mass assignable
    protected $fillable = [
        'item_code',
        'name',
        'description',
        'category',
        'um',
        'quantity',
        'price',
        'total_price',
        'brand',
        'vendor_id'
    ];

    // Define any relationships if necessary
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
