<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class BaseMagnet extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "base_magnets";

  protected $guarded = false;

}
