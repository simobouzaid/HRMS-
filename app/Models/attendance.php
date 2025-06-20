<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'check_in',
        'check_out',
        'status'
    ];



    public function dataUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
