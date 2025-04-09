<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Rule extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "rules";


  protected $guarded = false;

}
