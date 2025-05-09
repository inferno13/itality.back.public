<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class BaseDoorstep extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "base_doorsteps";

  protected $guarded = false;

}
