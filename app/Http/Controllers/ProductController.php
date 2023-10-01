<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return response(Product::all());
    }

    public function store(Request $request, Product $product) {
        
      $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);

          $product->create($request->all());
       return response(['message' => 'Product has been insert']);

       
    }

    public function show(Product $product) {
        return $product;
    }

    public function update(Request $request, Product $product) {
        
        $request->validate([
              'name' => 'required',
              'slug' => 'required',
              'price' => 'required'
          ]);
  
       $product->update($request->all());

       return $product;
         
      }

      public function destroy(Product $product) {

        $product->delete();
       return response(['message' => 'Product has been delete']);

      }

      
      public function search($name) {

       $product = Product::where('name','LIKE', '%'.$name.'%')->get();
  
           return $product; 
        

      }
}
