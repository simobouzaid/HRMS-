<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        try {


            $result = Auth::user();
            $result->load('data_role');
            if ($result->data_role->name === 'hr') {


                return response()->json([
                    $result->load('data_salarie', 'data_attendance')
                ]);


            } elseif ($result->data_role->name === 'admin') {
                return response()->json(
                    $result->load('data_salarie', 'data_attendance')
                );
            }

        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'errore de donnee',
                'details' => env('APP_DEBUG') ? $th->getMessage() : null
            ], 500);
        }
    }








}
