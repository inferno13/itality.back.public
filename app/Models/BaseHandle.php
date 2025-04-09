<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class BaseHandle extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "base_handles";

  protected $guarded = false;

}
