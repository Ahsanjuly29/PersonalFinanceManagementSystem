<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'business_name',
        'slug',
        'mobile',
        'phone',
        'email',
        'address',
        'proprietor',
        'other_email',
        'desc'
    ];
}
