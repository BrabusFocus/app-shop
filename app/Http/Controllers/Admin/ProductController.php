<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Listar Productos
     */
    public function index()
    {
      $products = Product::paginate(10);
      return view('admin.products.index')->with(compact('products'));
    }

    /**
     * Mostar Formulario de Registro Productos
     */
    public function create()
    {
      return view('admin.products.create');
    }

    /**
     * Almacenar el nuevo Producto en la BD
     */
    public function store(Request $request)
    {
      /**
       * Valiar Datos
       */
       $messages =[
         'name.required' => 'Es necesario ingresar un nombre para el producto',
         'name.min' => 'El producto debe tener al menos 3 caracteres',
         'description.required' => 'La descripción corta  es un campo obligatorio',
         'description.max'=> 'La descripción corta solo admite hasta 200 caracteres',
         'price.required' => 'Es obligatorio definir un precio para el producto',
         'price.numeric' =>   'Ingrese un precio valido',
          'price.min' =>   'No se admiten valore negativos (precio)',
          'long_description.required' => 'La descripción   es un campo obligatorio',
          'long_description.max'=> 'La descripción  solo admite hasta 500 caracteres'
       ];
       $rules = [
         'name' => 'required|min:3',
         'price'  => 'required|numeric|min:0',
         'description'  =>  'required|max:200',
         'long_description'  =>  'required|max:500'
       ];
       $this->validate($request,$rules,$messages);


      /**
       * Registrar un nuevo producto en l BD
       */
       $product = new Product();
       $product->name = $request->input('name');
       $product->description = $request->input('description');
       $product->price = $request->input('price');
       $product->long_description = $request->input('long_description');
       $product->save();//Insert en la tabla producto
       //Porteriormente redirecionar
       return  redirect('/admin/products');
    }

    /**
     * Mostar Formulario de editar Productos
     */
    public function edit($id)
    {
      $product = Product::find($id);
      return view('admin.products.edit')->with(compact('product'));
    }

    /**
     * Editar el nuevo Producto en la BD
     */
    public function update(Request $request,$id)
    {
      /**
       * Valiar Datos
       */
       $messages =[
         'name.required' => 'Es necesario ingresar un nombre para el producto',
         'name.min' => 'El producto debe tener al menos 3 caracteres',
         'description.required' => 'La descripción corta  es un campo obligatorio',
         'description.max'=> 'La descripción corta solo admite hasta 200 caracteres',
         'price.required' => 'Es obligatorio definir un precio para el producto',
         'price.numeric' =>   'Ingrese un precio valido',
          'price.min' =>   'No se admiten valore negativos (precio)',
          'long_description.required' => 'La descripción   es un campo obligatorio',
          'long_description.max'=> 'La descripción  solo admite hasta 500 caracteres'
       ];
       $rules = [
         'name' => 'required|min:3',
         'price'  => 'required|numeric|min:0',
         'description'  =>  'required|max:200',
         'long_description'  =>  'required|max:500'
       ];
       $this->validate($request,$rules,$messages);

      /**
       * Registrar un nuevo producto en l BD
       */
       //dd($request->all());
       $product = Product::find($id);
       $product->name = $request->input('name');
       $product->description = $request->input('description');
       $product->price = $request->input('price');
       $product->long_description = $request->input('long_description');
       $product->save();//Actualizar en la tabla producto
       //Porteriormente redirecionar
       return  redirect('/admin/products');
    }
    /**
     * Eliminar el nuevo Producto en la BD
     */
    public function delete($id)
    {
      /**
       * Registrar un nuevo producto en l BD
       */
       ProductImage::where('product_id',$id)->delete();
       $product = Product::find($id);
       $product->delete();//Eliminar en la tabla producto
       //Porteriormente redirecionar
       return  back();//Redirecion a la pagina anterios ( en la qe se encontraba el usuario)
    }

    public function show($id)
    {
      $product = Product::find($id);

    }

}
