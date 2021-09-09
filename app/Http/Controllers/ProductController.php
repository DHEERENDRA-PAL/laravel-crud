<?php

namespace App\Http\Controllers;
// use App\SubCategorie;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{  
    public function saveProduct(Request $request)
    { 
        $product = new Product();
        $validator = Validator::make($request->all(), [
			'product_name' => 'required|string|max:255',
			'size_code' => 'required|max:50',
			'sort_order' => 'required',
			'cotegory_id' => 'required|integer|not_in:0',
			'sub_cotegory_id' => 'required|integer',
			'color_code' => 'required',
			'color_name' => 'required'			
		]);
		if($validator->fails()){
			return response()->json($validator->errors(), 400);
		}
        $product->product_name = $request->input('product_name');
        $product->size_code = $request->input('size_code');
        $product->sort_order = $request->input('sort_order');
        $product->cotegory_id = $request->input('cotegory_id');
        $product->sub_cotegory_id = $request->input('sub_cotegory_id');
        $product->color_code = $request->input('color_code');
        $product->color_name = $request->input('color_name');
        $product->save();
         return response()->json($product);
        //return response()->json(['message'=>'Product Registered successfully,], 404);

    }
    public function getProduct()
    {
          $product =  Product::get();
          if($product){
            return response()->json(['message'=>'Product Insert Successfully'], 200);
            //   return response()->json($product);
          }else{
            return response()->json(['message'=>'Product not Inset '], 404);
          }
    }
    public function editProduct($id)
    {
        $product =  Product::find($id);
        if($product)
        {

            return response()->json($product);
        }else{
            return response()->json(['message'=>'Product not found...'], 400);
        }
    }
    public function update(Request $request , $id ){
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
			'size_code' => 'required|max:50',
			'sort_order' => 'required',
			'cotegory_id' => 'required|integer|not_in:0',
			'sub_cotegory_id' => 'required|integer',
			'color_code' => 'required',
			'color_name' => 'required'
			
		]);
        
		if($validator->fails()){
            return response()->json($validator->errors(), 400);
		}
        $product =  Product::find($id);
        if($product){
            $product->product_name = $request->input('product_name');
            $product->size_code = $request->input('size_code');
            $product->sort_order = $request->input('sort_order');
            $product->cotegory_id = $request->input('cotegory_id');
            $product->sub_cotegory_id = $request->input('sub_cotegory_id');
            $product->color_code = $request->input('color_code');
            $product->color_name = $request->input('color_name');
            $product->update();
                return response()->json(['message'=>'Product Update successfully,'],200);
        }else{
                return response()->json(['message'=>'Product not found...'], 400);
        }

        // return response()->json($product);
    }
    public function destroy($id)
    {
        $product =  Product::find($id);
        if($product)
        {
            $product->delete();
            return response()->json(['message'=>'Product Product Delete'], 200);
        }else{
            return response()->json(['message'=>'Product not delete...'], 400);
        }
    }
}
