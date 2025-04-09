<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Base extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "bases";

  protected $guarded = false;

  protected $casts = [
    'date_start_work' => 'datetime',
    'date_end_work' => 'datetime'
  ];

}
