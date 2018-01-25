<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function welcome()
    {
      /**
       * Extraer solo la categorias que tiene productos asignados
       * El metodo busca una relacion (hace un join )
       */
      $categories = Category::has('products')->get();//traer todas
      return view('welcome')->with(compact('categories'));
    }
}
