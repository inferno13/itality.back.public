<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class ConfigGrouping extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "config_groupings";

  protected $guarded = false;

}
