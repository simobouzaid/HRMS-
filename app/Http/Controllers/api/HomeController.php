<?php

namespace App\Http\Controllers\api;
use App\Models\attendance;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Mockery\Undefined;

class HomeController extends Controller
{
    public function index()
    {
        try {


            $result = Auth::user()->load('data_role','data_salarie','data_attendance');
            if ($result->data_role->name === 'hr') {


              return response()->json([
                       'data' =>$result
              ]);


            }

        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'حدث خطأ في جلب البيانات',
                'details' => env('APP_DEBUG') ? $th->getMessage() : null
            ], 500);
        }
    }







    
}
