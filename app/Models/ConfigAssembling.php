<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class ConfigAssembling extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "config_assemblings";

  protected $guarded = false;

}
