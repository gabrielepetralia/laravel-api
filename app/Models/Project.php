<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'slug',
    'description',
    'is_finished',
    'start_date',
    'end_date',
    'img_path',
    'img_original_name',
    'type_id'
  ];

  public function type()
  {
    return $this->belongsTo(Type::class);
  }

  public function technologies()
  {
    return $this->belongsToMany(Technology::class);
  }
}
