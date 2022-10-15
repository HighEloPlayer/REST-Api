<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
        public function allProducts(){
                $products = Product::all();
                return response()->json(['products'=>$products], 200);
}

        public function singleProduct($product_id){
                $products = Product::find($product_id);
                return response()->json(['products'=>$products],200);
        }

        public function categoryProduct($category_name){
                return Product::where('category', $category_name,)->get();

        }

        public function allCategory(){
                $products = Product::all();
                return response()->json(['products'=>$products], 200);
        }


        public function addProduct(Request $request){
                try {
                        $data = $request->json()->all();
                        $product = new Product();
                        $product->title = $data['title'];
                        $product->price = $data['price'];
                        $product->brand = $data['brand'];
                        $product->category = $data['category'];
                        $product->image = $data['image'];
                        $product->save();
                    } catch (Exception $e) {
                        Log::error($e->getMessage());
                        return response()->json([
                            'error' => 'Unable to save product'
                        ]);
                    }
                    
                    return response()->json([
                        'data' => $product
                    ]);
        }

       public function updateProduct(Request $request, $product_id){
                $request->validate([
                        'title'=>'required',
                        'description'=>'required',
                        'currency'=>'required',
                        'price'=>'required',
                        'brand'=>'required',
                        'category'=>'required',
                        'image'=>'required'
                ]);
                $product= Product::find($product_id);
                $product->title = $request->title;
                $product->description = $request->description;
                $product->currency = $request->currency; 
                $product->price = $request->price;
                $product->brand = $request->brand;
                $product->category = $request->category;
                $product->image = $request->image;
 
                $product->update();
                return response()->json();

        }

        public function deleteProduct($product_id){
                $product = Product::find($product_id);
                $product->delete();
        }

        public function searchProduct($title){
                return Product::where("title", $title)->get();
        }
}

