<?php

namespace Facrinama\Http\Controllers;

use Illuminate\Http\Request;
use Facrinama\Product;
class SearchController extends Controller
{
    //
    public function show(Request $request)
    {
      $query = $request->input('query');
      $products = Product::where('name','like',"%$query%")->paginate(5);
      /**
       * Si el resultado de la busqueda es 1 (escribe todo el nomnbre del producto)
       * Se redireccionara ala pagina del producto, si no se muestra la pagina de resultados
       */
      if ($products->count() == 1) {
        $id = $products->first()->id;
        return redirect("/products/$id");
        /*Usar las comillas dobles y poner una varianle dentro equilave a usar las comillas simples
        y concanetar manualmente 'products'.$id
        */
      }
      return view('search.show')->with(compact('products','query'));
    }

    /**
     * Este metodo extrae todos los valores para una clave determinada
     * Para este caso la clave es name (nombre del producto) en formato de arreglo
      */
    public function data()
    {
      $products = Product::pluck('name');//obtener el nombre de los productos
      return $products;
    }
}
