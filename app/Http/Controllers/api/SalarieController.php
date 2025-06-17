<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\salarie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\api\Exception;

class SalarieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {         

        return response()->json([
            'salarie'=>  salarie::get()->where('user_id',Auth::id())
        
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{       
    
               
        $salarie=   salarie::create([
                'user_id' => Auth::id()
                ,'base_salary'=> $request->base_salary
                ,'bonus' => $request->bonus
                ,'deductions' => $request->deductions
                ,'total' => $request->total
                ,'month' => $request->month
                ,'status' => $request->status


           ]);     

           



        }Catch(\Exception $e){

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(salarie $salarie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, salarie $salarie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(salarie $salarie)
    {
        //
    }
}
