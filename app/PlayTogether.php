<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayTogether extends Model
{
  protected $dates = ['published_at'];

  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;

    if (! $this->exists) {
      $this->attributes['slug'] = str_slug($value);
    }
  }


  public function category()
  {
    return $this->belongsTo('App\Category');
  }
}
