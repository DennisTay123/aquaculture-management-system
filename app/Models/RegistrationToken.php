<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationToken extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'token', 'expired_at'];

    protected $dates = ['expired_at'];

}
