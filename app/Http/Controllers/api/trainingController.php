<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\training;
use Illuminate\Http\Request;
use Response;

class trainingController extends Controller
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
            training::create([
                'title' => $request->title,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);
            return Response()->json([
                'result' => 'avec success'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'result' => $th->getPrevious()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(training $training)
    {
        try {
            return response()->json([$training]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([$th->getPrevious()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, training $training)
    {
        try {
            $training->update([
                'title' => $request->title,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);
            return response()->json([
                'result' => 'avec success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([$th->getPrevious()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(training $training)
    {
        try {
             
         $training->delete();
        } catch (\Throwable $th) {
            return response()->json([$th->getPrevious()]);

        }
    }
}
