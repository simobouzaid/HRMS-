<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salarie extends Model
{
       protected $fillable=['id','user_id','base_salary','bonus','deductions','total','month','status'];




       public function data_performance_reviews(){
        $this->hasMany(performance_review::class);
       }
}
