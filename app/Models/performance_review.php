<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class performance_review extends Model
{
    protected $fillable=['id','user_id','reviewed_id','rating','comments','review_date'];

      public function data_salarie(){
        return $this->belongsTo(salarie::class,'reviewed_by');
      }

  

}
