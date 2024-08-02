<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Interfaces\IUserService;
use Exception;

class UserController extends Controller
{
    protected $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = $this->userService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Users retrieved successfully',
            'data' => $user
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:user_profiles|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();

        $user = $this->userProfileService->create($data);*/

        return response()->json([
            'status' => true,
            'message' => 'This method is disable',
        ], 418);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = $this->userService->get($id);

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
        $validator = Validator::make($request->all(), [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|unique:user_profiles,email,' . $id
        ]);

        // validação condicional personalizada
        $validator->after(function ($validator) use ($request) {
            if (!$request->filled('first_name') && !$request->filled('last_name') && !$request->filled('email')) {
                $validator->errors()->add('any_field', 'At least one field must be provided for the update.');
            }
        });

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();
        $updatedUserProfile = $this->userService->update($id, $data);

        if (!$updatedUserProfile) {
            return response()->json([
                'status' => false,
                'message' => 'User profile not found'
            ], 404);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Updated!'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->userService->delete($id);

        if(!$deleted){
            return response()->json([
                'status' => false,
                'message' => 'Some error occurred'
            ],500);
        }

        return response()->json([
            'status' => true,
            'message' => 'User deleted!'
        ],200);
    }

    public function getTokens(Request $request)
    {
        $tokens = $request->user()->tokens;

        if (!$tokens) {
            return response()->json([
                'status' => false,
                'message' => 'User has no tokens',
            ], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'Tokens found!',
            'data' => $tokens,
        ], 200);
    }

    public function clearTokens(Request $request)
    {
        if($this->userService->deleteAllTokens($request->user()->id)){
            return response()->json([
                'status' => true,
                'message' => 'All tokens deleted! You\'re log out',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Tokens not deleted. Maybe has no tokens.',
            ], 401);
        }

    }

    public function deleteTokens(Request $request)
    {
        $ids = $request->input('ids');
        $user = $request->user();

        if($ids){
            try {
                $count = $this->userService->deleteTokens($user, $ids);

                if ($count > 0) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Tokens deleted successfully.',
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'No tokens found for the provided IDs.',
                    ], 404);
                }
            } catch (Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                ], 500);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No token IDs provided.',
            ], 400);
        }
    }
}
