<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    protected $fillable=['id','title','description','start_date','end_date'];
    public function data_trainings(){

        return $this->hasMany(training_user::class);
    }
}
