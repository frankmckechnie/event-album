<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $fillable = ['path'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function album()
  {
    return $this->belongsTo(Album::class);
  }

}