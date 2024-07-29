<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\IItemService;

class ItemController extends Controller
{
    protected $itemService;

    protected $createRules = [
        'code' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'supplier_id' => 'required|integer|exists:suppliers,id',
        'category_id' => 'required|integer|exists:categories,id',
        'store_id' => 'required|integer|exists:stores,id',
    ];

    public function __construct(IItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = $this->itemService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Items retrieved successfully',
            'data' => $items
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

        $item = $this->itemService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Item created successfully',
            'data' => $item
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = $this->itemService->get($id);

        if(!$item) {
            return response()->json([
                'status' => false,
                'message' => 'Item not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Item found successfully',
            'data' => $item
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        print_r('chegou aqui');
        $data = $request->all();
        $item = $this->itemService->update($id, $data);

        if (!$item) {
            return response()->json([
                'status' => false,
                'message' => 'Item not found'
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
        $deleted = $this->itemService->delete($id);

        if(!$deleted){
            return response()->json([
                'status' => false,
                'message' => 'Some error occurred'
            ],500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Item deleted!'
        ],200);
    }
}
