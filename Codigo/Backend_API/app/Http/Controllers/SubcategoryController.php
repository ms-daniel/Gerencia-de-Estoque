<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\ISubcategoryService;

class SubcategoryController extends Controller
{
    protected $subcategoryService;

    protected $createRules = [
        'name' => 'required|string|max:255',
    ];

    public function __construct(ISubcategoryService $subcategoryService)
    {
        $this->subcategoryService = $subcategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = $this->subcategoryService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Subcategories retrieved successfully',
            'data' => $subcategories
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

        $subcategory = $this->subcategoryService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Subcategory created successfully',
            'data' => $subcategory
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subcategory = $this->subcategoryService->get($id);

        if(!$subcategory) {
            return response()->json([
                'status' => false,
                'message' => 'Subcategory not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Subcategory found successfully',
            'data' => $subcategory
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $subcategory = $this->subcategoryService->update($id, $data);

        if (!$subcategory) {
            return response()->json([
                'status' => false,
                'message' => 'Subcategory not found'
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
        $deleted = $this->subcategoryService->delete($id);

        if(!$deleted){
            return response()->json([
                'status' => false,
                'message' => 'Some error occurred'
            ],500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Subcategory deleted!'
        ],200);
    }
}
