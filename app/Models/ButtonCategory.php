<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class ButtonCategory extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "button_categories";

  protected $guarded = false;

}
