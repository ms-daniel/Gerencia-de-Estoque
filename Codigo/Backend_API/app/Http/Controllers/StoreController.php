<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\IStoreService;

class StoreController extends Controller
{
    protected $storeService;

    protected $createRules = [
        'name' => 'required|string|max:255',
        'street' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'state' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'postal_code' => 'required|string|max:20',
        'user_id' => 'required|integer|exists:users_profiles,id',
    ];

    public function __construct(IStoreService $storeService)
    {
        $this->storeService = $storeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = $this->storeService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Stores retrieved successfully',
            'data' => $stores
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->createRules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        $store = $this->storeService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Store created successfully',
            'data' => $store
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $store = $this->storeService->get($id);

        if(!$store) {
            return response()->json([
                'status' => false,
                'message' => 'Store not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Store found successfully',
            'data' => $store
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $store = $this->storeService->update($id, $data);

        if (!$store) {
            return response()->json([
                'status' => false,
                'message' => 'Store not found'
            ],404);
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
        $deleted = $this->storeService->delete($id);

        if(!$deleted){
            return response()->json([
                'status' => false,
                'message' => 'Some error occurred'
            ],500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Store deleted!'
        ],200);
    }
}
