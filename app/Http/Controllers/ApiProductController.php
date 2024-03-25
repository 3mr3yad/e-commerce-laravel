<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class ApiProductController extends Controller
{
    public function all()
    {
        $products =  Product::all();
        if ($products == null) {
            return response()->json([
                "msg" => "Product not found"
            ], 404);
        }
        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product =  Product::find($id);
        if ($product == null) {
            return response()->json([
                "msg" => "Product not found"
            ], 404);
        }
        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        // check
        $validator =  Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "price" => "required|numeric",
            "quantity" => "required|numeric",
            "image" => "image|mimes:jpg,jpeg,png",
            "category_id" => "required|exists:categories,id",
        ]);
        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors()->first()
            ], 401);
        }
        $imageName = Storage::putFile("products", $request->image);
        // create
        Product::create([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => $imageName,
            "category_id" => $request->category_id,
        ]);

        // msg
        return response()->json([
            "msg" => "product created successfully"
        ], 201);
    }

    public function update($id, Request $request)
    {
        // check
        $validator =  Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "price" => "required|numeric",
            "quantity" => "required|numeric",
            "image" => "image|mimes:jpg,jpeg,png",
            "category_id" => "required|exists:categories,id",
        ]);
        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors()
            ], 401);
        }

        //find
        $product =  Product::find($id);
        if ($product == null) {
            return response()->json([
                "msg" => "Product not found"
            ], 404);
        }

        //storages
        $imageName = $product->images;
        if ($request->has('image')) {
            if ($product->image !== null) {
                Storage::delete($imageName);
            }
            $imageName = Storage::putFile("products", $request->image);
        }
        // update
        $product->update([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => $imageName,
            "category_id" => $request->category_id,
        ]);

        //msg
        return response()->json([
            "msg" => "product updated successfully",
            "product" => new ProductResource($product)
        ], 201);
    }

    public function delete($id)
    {
        $product =  Product::find($id);
        if ($product == null) {
            return response()->json([
                "msg" => "Product not found"
            ], 404);
        }
        // storage
        if ($product->image !== null) {
            Storage::delete($product->image);
        }

        // delete
        $product->delete();

        // msg
        return response()->json([
            "success" => "Product Deleted Successfully"
        ], 201);
    }
}
