<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'activities';

    // Primary key
    protected $primaryKey = 'id';

    // Attributes that are mass assignable
    protected $fillable = [
        'tank_id',
        'employee_id',
        'activity',
        'feed_type',
        'unit_measurement',
        'quantity'
    ];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
