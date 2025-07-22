<?php

use Illuminate\Support\Facades\Route;

route::get('/', function () {
    return response()->json([
        'laravel'=>'api'
    ]) ;
});