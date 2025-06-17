<?php

namespace App\Http\Controllers\api;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

use App\Http\Controllers\Controller;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(user::all());
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string',
                'position' => 'required|string|max:255',
                'department' => 'required|string',
                'hire_date' => 'nullable|date',
                'role_id' => 'nullable|integer',
                'status' => 'required|in:active,inactive',
            ]);


            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'position' => $validated['position'] ?? 'dev',
                'department' => $validated['department'] ?? 'it',
                'hire_date' => $validated['hire_date'] ?? null,
                'role_id' => $validated['role_id'] ?? null,
                'status' => $validated['status'] ?? 'inactive',
            ]);


            return response()->json([
                'message' => 'Utilisateur créé avec succès.',
                'user' => $user
            ], 201);

        } catch (ValidationException $e) {

            return response()->json([
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {

        return response()->json($user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {

        $user->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);

        return response()->json([
            "action" => 'true',
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        return $user->delete();
    }



    // login methode


    public function login(request $request)
    {
        try {

            if (
                Auth::attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ])
            ) {

                $user = Auth::user();
                return response()->json(
                    [
                        'msg' => 'is connected',
                        'token' => $user->createToken('auth_token')->plainTextToken,
                        'userName' => $user->name

                    ]
                );
            }



            return response()->json([
                'msg' => 'not existe'
            ]);
        } catch (Exception $e) {

            return response()->json([
                'errore' => $e
            ]);
        }



    }
}
