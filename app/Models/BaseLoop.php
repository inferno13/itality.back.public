<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class BaseLoop extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "base_loops";

  protected $guarded = false;

}
