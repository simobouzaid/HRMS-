<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class training_user extends Model
{

protected $fillable=['id','training_id','user_id','status'];
public function data_training(){
    return $this->belongsTo(training::class,'training_id');
}

}
