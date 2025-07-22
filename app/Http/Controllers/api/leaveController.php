<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\leave;
use Illuminate\Http\Request;

class leaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            leave::create([
                'user_id'=>$request->user_id,
                'type'=>$request->type,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'reason' => $request->reason,
                'status' => $request->status
            ]);
        } catch (\Throwable $th) {
           return response()->json($th->getPrevious());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(leave $leave)
    {
         try {
            return response()->json(['leave'=>$leave]);
            
        } catch (\Throwable $th) {
           return response()->json($th->getPrevious());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, leave $leave)
    {
        try {
            leave::update([
                'user_id'=>$request->user_id,
                'type'=>$request->type,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'reason' => $request->reason,
                'status' => $request->status
            ]);
        } catch (\Throwable $th) {
           return response()->json($th->getPrevious());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(leave $leave)
    {
       try {
            $leave->delete();
        } catch (\Throwable $th) {
           return response()->json($th->getPrevious());
        }
    }
}
