<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Models\Product;

class ProductController extends BaseController {
    public function show($id) {
        $token = CSRFToken::_token();
        $product = Product::where('id', $id)->first();
        return view('product', compact('token', 'product'));
    }

    public function get($id) {
        $product = Product::where('id', $id)->with(['category', 'subCategory'])->first();
        
        if ($product) {
            $similarProducts = Product::where('category_id' , $product->category_id)->
                where('id', '!=', $id)->inRandomOrder()->limit(8)->get();

            echo json_encode([
                'product' => $product, 'category' => $product->category, 
                'subCategory' => $product->subCategory, 'similarProducts' => $similarProducts
            ]);
            exit;
        } 

        header('HTTP/1.1 422 Unprocessable Entity', true, 422);
        echo 'Product not found';
        exit;
    }
}