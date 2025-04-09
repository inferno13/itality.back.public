<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;


class ConfigScene extends Model
{
  use HasApiTokens, HasFactory;

  protected $table = "config_scenes";

  protected $guarded = false;

//  protected $casts = [
//    'date_start_work' => 'datetime',
//    'date_end_work' => 'datetime'
//  ];

  public static function boot()
  {
    parent::boot();

    static::deleting(function ($configScene) {
      $images = [
          $configScene->button,
          $configScene->scene_left,
          $configScene->scene_right,
          $configScene->mask_left,
          $configScene->mask_right
      ];

      foreach ($images as $image) {
          if (!empty($image)) {
              Storage::disk('public')->delete($image);
          }
      }
    });
  }

}

