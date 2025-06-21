<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\user;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

          $result = user::where('role_id',2)->first();

              if(empty($result)){

                $roles = Role::get();
                return response()->json([
                  'roles' => $roles
                ]);
              }
            return response()->json(role::where('id','!=',2)->get());




         } catch (Exception $e) {
           return response()->json($e->getPrevious());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
          
            role::create(['name'=> $request->name]);
            return response()->json(['msg'  => 'avec success']);

        } catch (\Throwable $th) {
          return $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(role $role)
    {
     try {
    return response()->json($role) ;   
    } catch (\Throwable $th) {
        return $th;
     }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, role $role):bool
    {
        try {
            $role->update([
                'name' => $request->name
            ]);

            return true;
        } catch (\Throwable $th) {
           return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(role $role):bool
    {
      try {
        $role->delete();
        return true;
      } catch (\Throwable $th) {
        //throw $th;
        return false;
      }   
    }
}