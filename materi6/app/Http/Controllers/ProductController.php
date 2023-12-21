<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductReq;
use App\Http\Requests\UpdateProductReq;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $query_data = ProductCategory::all();
            $formatted = new ProductCollection($query_data);

            return response()->json([
                "message"=>"success",
                "data"=>$formatted
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductReq $request)
    {
        $validate_req = $request->validated();

        try {
            $query_data = ProductCategory::create($validate_req);
            $formatted = new ProductResource($query_data);

            return response()->json([
                "message"=>"success",
                "data"=>$formatted
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $query_data = ProductCategory::findOrFail($id);
            $formatted = new ProductResource($query_data);

            return response()->json([
                "message"=>"success",
                "data"=>$formatted
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductReq $request, string $id)
    {
        $validate_req = $request->validated();
        
        try {
            $query_data = ProductCategory::findOrFail($id);
            $query_data->update($validate_req);
            $query_data->save();

            $formatted = new ProductResource($query_data);

            return response()->json([
                "message"=>"success",
                "data"=>$formatted
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $query_data = ProductCategory::findOrFail($id);
            $query_data->delete();
            $formatted = new ProductResource($query_data);

            return response()->json([
                "message"=>"success",
                "data"=>$formatted
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
