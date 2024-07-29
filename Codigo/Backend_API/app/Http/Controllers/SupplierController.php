<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Interfaces\ISupplierService;

class SupplierController extends Controller
{
    protected $supplierService;

    protected $createRules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'user_id' => 'required|integer|exists:users_profiles,id',
    ];

    public function __construct(ISupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->supplierService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Suppliers retrieved successfully',
            'data' => $users
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

        $supplier = $this->supplierService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Supplier created successfully',
            'data' => $supplier
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = $this->supplierService->get($id);

        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Supplier not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Supplier found successfully',
            'data' => $user
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $supplier = $this->supplierService->update($id, $data);

        if (!$supplier) {
            return response()->json([
                'status' => false,
                'message' => 'Supplier not found'
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
        $deleted = $this->supplierService->delete($id);

        if(!$deleted){
            return response()->json([
                'status' => false,
                'message' => 'Some error occurred'
            ],500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Supplier deleted!'
        ],200);
    }
}
