<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Product extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "products";

  protected $guarded = false;
}
