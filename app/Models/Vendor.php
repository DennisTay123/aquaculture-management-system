<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'vendors';

    // Primary key
    protected $primaryKey = 'id';

    // Attributes that are mass assignable
    protected $fillable = [
        'name',
        'contact_person',
        'contact_number',
        'address',
        'payment_terms'
    ];

    // Define any relationships if necessary
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
