<?php

namespace App\Http\Controllers\api;

use DateTime;
use App\Models\attendance;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;


class attendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{ 
       
              $attendance = attendance::with('dataUser')->get();
              return response()->json($attendance);



        }catch(Exception $e){

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    
    // public function store()
    // {
    //     try {

    //         // $late = $this->checkdate(new DateTime());

    //         Attendance::create([
    //             'user_id' => Auth::id(),
    //             'date' => new DateTime(),
    //             'check_in' => now()->format('H:i:s'),
    //             'check_out' => now()->format('H:i:s'),
    //             'status' => 'present'
    //         ]);

    //         return true;
    //     } catch (\Throwable $th) {

    //         return false;
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(attendance $attendance)
    {
         return response()->json($attendance);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, attendance $attendance)
    {
               try {     

                      
                       
                 
                return true;

               } catch (\Throwable $th) {
                return false;
               }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(attendance $attendance)
    {

    }







}