<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Order extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "orders";

  protected $guarded = false;

  protected $casts = [
    'date_start_work' => 'datetime',
    'date_end_work' => 'datetime'
  ];

}
