<?php

namespace Facrinama;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  //varible de carga masiva
  protected $fillable = ['name','description'];
  /**
  * Valiar Datos
  */
  public static $messages =[
    'name.required' => 'Es necesario ingresar un nombre para la Categoría',
    'name.min' => 'El nombre de la categoria debe tener al menos 3 caracteres',
    'description.required' => 'La descripción corta  es un campo obligatorio',
    'description.max'=> 'La descripción corta solo admite hasta 200 caracteres'
  ];
  public static $rules = [
    'name' => 'required|min:3',
    'description'  =>  'required|max:200'
  ];
  public function products()
  {
    return $this->hasMany(Product::class);
  }
  /**
  * Acceso
   * Obtener la imagen destacada del producto y asingarnar como imagen de categoria
   */
  public function getFeaturedImageUrl()
  {
    # code...
    /**
     * Mostrar image  del producto destacado , el producto mas vendido por categoria. si la categorua
     * no tiene productos y no tiene imagen asignada (la categorua) entonces mostrar imagen por default
     */
     if ($this->image) {
       return '/images/categories/'.$this->image;
     }
     $firstProduct = $this->products()->first();
     if ($firstProduct) {
       return $firstProduct->featured_image_url;
     }

    return '/images/default.png';
  }
}
