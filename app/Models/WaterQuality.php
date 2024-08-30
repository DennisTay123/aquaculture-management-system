<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterQuality extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'water_qualities';

    // The primary key associated with the table.
    protected $primaryKey = 'id';

    // The attributes that are mass assignable.
    protected $fillable = [
        'entry_id',
        'field1',
        'field2',
        'field3',
        'field4',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'entry_id' => 'integer',
        'field1' => 'decimal:5',
        'field2' => 'decimal:5',
        'field3' => 'decimal:5',
        'field4' => 'decimal:5',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
