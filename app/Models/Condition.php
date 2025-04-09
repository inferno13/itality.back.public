<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Condition extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = "conditions";

    protected $guarded = false;
}
