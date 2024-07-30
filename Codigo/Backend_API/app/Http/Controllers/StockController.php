<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\IStockService;

class StockController extends Controller
{
    protected $stockService;

    protected $createRules = [
        'item_id' => 'required|integer|exists:items,id',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'manufactured' => 'nullable|date',
        'validity' => 'nullable|date|after_or_equal:manufactured',
    ];

    protected $createMovementRules = [
        'movement_type' => 'required|in:entrada,saida',
        'quantity' => 'required|integer|min:1',
        'stock_id' => 'required|integer|exists:stocks,id',
    ];

    public function __construct(IStockService $stockService)
    {
        $this->stockService = $stockService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = $this->stockService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Stocks retrieved successfully',
            'data' => $stocks
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

        $stock = $this->stockService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Stock created successfully',
            'data' => $stock
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $stock = $this->stockService->get($id);

        if(!$stock) {
            return response()->json([
                'status' => false,
                'message' => 'Stock not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Stock found successfully',
            'data' => $stock
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $stock = $this->stockService->update($id, $data);

        if (!$stock) {
            return response()->json([
                'status' => false,
                'message' => 'Stock not found'
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
        $deleted = $this->stockService->delete($id);

        if(!$deleted){
            return response()->json([
                'status' => false,
                'message' => 'Some error occurred'
            ],500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Stock deleted!'
        ],200);
    }
}
