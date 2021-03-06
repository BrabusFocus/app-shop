<?php

namespace Facrinama\Http\Controllers;

use Illuminate\Http\Request;
use Facrinama\Product;
class ProductController extends Controller
{
    public function show($id)
    {
      $product = Product::find($id);
      $images = $product->images;// images asociadas al producto

      $imagesLeft = collect();
      $imagesRight = collect();

      foreach ($images as $key => $image) {

        if ($key%2==0) {
          $imagesLeft->push($image);
        } else {
          $imagesRight->push($image);
        }

      }
      return view('products.show')->with(compact('product','imagesLeft','imagesRight'));
    }
}
