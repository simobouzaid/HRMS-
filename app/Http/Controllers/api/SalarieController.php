<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\salarie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class SalarieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response()->json([
            'salarie' => salarie::get()->where('user_id', Auth::id())

        ]);

    }
    // calcul  total salair       





    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {


            $salarie = salarie::create([
                'user_id' => Auth::id()
                ,
                'base_salary' => $request->base_salary
                ,
                'bonus' => $request->bonus
                ,
                'deductions' => $request->deductions
                ,
                'total' => $request->total
                ,
                'month' => $request->month
                ,
                'status' => $request->status


            ]);

            response()->json(['msg'=>'ajouter avec success']);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(salarie $salarie)
    {
        try {
            return response()->json($salarie);

        } catch (Exception $e) {
          return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, salarie $salarie)
    {  


       return  $salarie->update([
                'base_salary' => $request->base_salary
                ,
                'bonus' => $request->bonus
                ,
                'deductions' => $request->deductions
                ,
                'total' => $request->total
                ,
                'month' => $request->month
                ,
                'status' => $request->status


            ]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(salarie $salarie)
    {
       try{
         $salarie->delete();
       }catch(Exception $e){
          return response()->json($e);
       }
    }
}
