<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
protected $fillable=['id','name'];


public function data_user(){
return $this->hasMany(user::class,'role_id');
}


}
