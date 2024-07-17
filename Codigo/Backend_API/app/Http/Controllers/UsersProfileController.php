<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\UsersProfile;

class UsersProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UsersProfile::all();
        return response()->json([
            'status' => true,
            'message' => 'Users retrieved successfully',
            'data' => $users
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users_profiles|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = UsersProfile::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = UsersProfile::findOrFail($id);

            return response()->json([
                'status' => true,
                'message' => 'User found successfully',
                'data' => $user
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $user = UsersProfile::findOrFail($id);
        } catch(ModelNotFoundException $e){
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'email' => 'string|email|unique:users_profiles,email,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->has('first_name')) {
            $user->first_name = $request->input('first_name');
        }

        if ($request->has('last_name')) {
            $user->last_name = $request->input('last_name');
        }

        if ($request->has('email')) {
            $user->email = $request->input('email');
        }

        $user->save();

        return response()->json([
            'status' => true,
            'message'=> 'User updated successfully'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $user = UsersProfile::findOrFail($id);
        } catch(ModelNotFoundException $e){
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'User deleted!'
        ],204);
    }
}
