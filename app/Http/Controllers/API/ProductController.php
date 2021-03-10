<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Product;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Resources\Product as ProductResource;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request) 
    {
        $products = Product::orderBy('name', 'ASC')
            ->paginate(5);

        return response()->json([
            "total" => $products->total(),
            "perPage" => $products->perPage(),
            "currentPage" => $products->currentPage(),
            "lastPage" => $products->lastPage(),
            "data" => ProductResource::collection($products)
        ], 200);
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
            'images' => 'required',
            'images.*' => 'image|file|mimes:jpeg,bmp,png|max:10000'
        ]);

        if ($validator->fails()) {
            return response()->json([
               'message' => 'Validation Error',
               'formErrors' => $validator->errors()
            ], 412);
        }

        $imageCount = count($request->file('images'));

        $images = [];
        for ($file = 0; $file < $imageCount; $file++) {
            $extension_name = $request->images[$file]->getClientOriginalExtension();
            $image_path = $request->images[$file]->storeAS('/images', uniqid().'.'.$extension_name);
            $images[] = $image_path;
        }
        
        $time  = date("H:i:s", strtotime($request->time));

        $product = new Product();
        $product->name = $request->name;
        $product->category = $request->category;
        $product->date_time = $request->date.' '.$time;
        $product->description = $request->description;
        $product->images = json_encode($images);
        $product->save();

        return response()->json([
            'message' => 'New product has been added successfully!',
        ], 200);

    }

    public function edit(Request $request, Product $product) 
    {
        $date = Carbon::parse($product->date_time)->format('Y-m-d');
        $time = Carbon::parse($product->date_time)->format('H:i');
     
        if ($product) {
            return response()->json([
                "data" => new ProductResource($product),
                "date" => $date,
                "time" => $time,
            ], 200);
        }
    }

    public function update(Request $request, Product $product) 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
               'message' => 'Validation Error',
               'formErrors' => $validator->errors()
            ], 412);
        }

        $time  = date("H:i:s", strtotime($request->time));

        $product->name = $request->name;
        $product->category = $request->category;
        $product->date_time = $request->date.' '.$time;
        $product->description = $request->description;
        $product->save();

        return response()->json([
            'message' => 'Product updated successfully!',
        ], 200);

    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'query' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
               'message' => 'Validation Error',
               'formErrors' => $validator->errors()
            ], 412);
        }

        $keyword = strtoupper($request->input('query'));
      
        $searchProduct = Product::where('name', 'LIKE', $keyword.'%')
            ->orWhere('description', 'LIKE', $keyword.'%')
            ->get();
        
        return response()->json([
            'data' => ProductResource::collection($searchProduct)
        ], 200);
    }

    public function category(Request $request) 
    {
        $categories = Product::select('category')
            ->groupBy('category')
            ->get();

        return response()->json([
            "categories" => $categories
        ], 200);
    }

    public function filter(Request $request) 
    {
        $categories = Product::select('category')
            ->groupBy('category')
            ->get();

        $validator = Validator::make($request->all(), [
            'query' => 'in:All,'.$categories->pluck('category')->implode(','),
        ]);

        if ($validator->fails()) {
            return response()->json([
               'message' => 'Validation Error',
               'formErrors' => $validator->errors()
            ], 412);
        }

        $keyword = strtoupper($request->input('query'));

        $products = Product::where('category', $keyword)->get();
        return response()->json([
            "data" => ProductResource::collection($products)
        ], 200);
    }

    public function destroy(Request $request, Product $product) 
    {
        if ($product->delete()) {

            $message = 'Product deleted successfully.';
            $code = 200;

        } else {

            $message = 'Product delete error. The requested resource is in use.';
            $code = 400;

        }

        return response()->json([
            'message' => $message
        ], $code);
    }
}
