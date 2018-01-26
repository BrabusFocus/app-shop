<?php

namespace Facrinama\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Facrinama\Http\Controllers\Controller;
use Facrinama\Category;
class CategoryController extends Controller
{
  /**
  * Listar Productos
  */
  public function index()
  {
    $categories = Category::orderBy('name')->paginate(10);
    return view('admin.categories.index')->with(compact('categories'));
  }

  /**
  * Mostar Formulario de Registro Productos
  */
  public function create()
  {
    return view('admin.categories.create');
  }

  /**
  * Almacenar el nuevo Producto en la BD
  */
  public function store(Request $request)
  {
    /**
    * Los mensajes y las reglas de valdiad ahora son propiedades del modelo
    * So propiedad publicas y staticas
    */
    $this->validate($request,Category::$rules,Category::$messages);
    /**
    * flash data
    */
    $notitication = 'Categoría creada exitosamente ';

    /**
    * Registrar un nuevo producto en l BD
    */
    Category::create($request->all());//asignacion masiva (declar atributo en el modelo)
    //Porteriormente redirecionar
    return  redirect('/admin/categories');
  }

  /**
  * Mostar Formulario de editar Productos
  */
  public function edit(Category $category)
  {
    // $category = Category::find($id);
    return view('admin.categories.edit')->with(compact('category'));
  }

  /**
  * Editar el nuevo Producto en la BD
  */
  public function update(Request $request,Category $category)
  {
    /**
    * los mensajes y las reglas de valdiad ahora son propiedades del modelo
    */
    $this->validate($request,Category::$rules,Category::$messages);

    /**
    * Actualizar category en l BD
    */
    $category->update($request->all());//datos masivo
    //Porteriormente redirecionar
    return  redirect('/admin/categories');
  }
  /**
  * Eliminar el nuevo Producto en la BD
  */
  public function delete(Category $category)
  {
    /**
    * Eliminar un nuevo producto en l BD
    */
    $category->delete();//Eliminar
    //Porteriormente redirecionar
    return  back();//Redirecion a la pagina anterios ( en la qe se encontraba el usuario)
  }

  public function show($id)
  {
    $product = Product::find($id);

  }
}
