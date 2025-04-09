<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Config extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "configs";

  protected $guarded = false;

  public static function boot()
  {
    parent::boot();

    static::deleted(function ($config) {
      $config->configScenes()->delete();
    });
  }

  public function configScenes()
  {
    return $this->hasMany(ConfigScene::class, 'config_id', 'id');
  }
}
