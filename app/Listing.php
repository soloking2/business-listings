<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //
    //protected $table = 'listings';
    public function user(){
      return $this->belongsTo('App\User');
    }
}
