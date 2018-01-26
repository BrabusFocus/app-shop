<?php

namespace Facrinama;
use Facrinama\Category;
use Facrinama\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function  images()
    {
      /**
       * Un producto o esto tiene muchas imaganes
       */
      return $this->hasMany(ProductImage::class);
    }
    /**
     * Campo calculado
     */
    public function getFeaturedImageUrlAttribute()
    {
      /**
       * Obtener la primera (o una) imagen destacada de los productos ( donde el campo destacado sea true)
       * Si no tiene una imagen descatada,  obtener la primera imagen (campo destacado false)
       * Si el campo tiene una imagen asignada retornar la url de decha imagen  (url es campo calulado del modelo ProductImage)
       * Si el producto no tiene imagenes asingadas retornar URL de imagen por defecto.
       */
      $featuredImage = $this->images()->where('featured',true)->first();
      if (!$featuredImage) {
         $featuredImage = $this->images()->first();
      }
      if ($featuredImage) {
        return $featuredImage->url;
      }
      /**
       * Imagenes por defecto
       */
      return '/images/products/default.png';

    }

    public function getCategoryNameAtributte()
    {
      if ($this->category) {
          return $this->category->name;
      }
      return 'General';
    }
}
