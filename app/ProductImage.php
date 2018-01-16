<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    public function product()
    {
      /**
       * Esto pertence un producto determinado
       */
      return $this->belongsTo(Product::class);
    }
    /**
     * Campo calulado
     */
    public function getUrlAttribute()
    {
      if (substr($this->image,0,4) === "http") {
        return $this->image;
      }
      return '/images/products/'.$this->image;
    }
}
