<?php

namespace Facrinama\Http\Controllers;

use Illuminate\Http\Request;
use Facrinama\Category;
class CategoryController extends Controller
{
    //
    public function show(Category $category)
    {
      # code...
      $products = $category->products()->paginate(10);
      return view('categories.show')->with(compact('category','products'));
    }
}
