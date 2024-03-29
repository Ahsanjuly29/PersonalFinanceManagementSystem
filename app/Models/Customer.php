<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'slug',
        'mobile',

        'phone',
        'email',
        'business_name',
        'other_email',

        'address',
        'desc'
    ];
}
