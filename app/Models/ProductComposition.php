<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class ProductComposition extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = "product_compositions";

    protected $guarded = false;
}
