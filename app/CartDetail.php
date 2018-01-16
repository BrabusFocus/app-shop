<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * CartDetail N     1 Product
 * Un CartDetail le pertece un producto
 */
class CartDetail extends Model
{

    public function product()
    {
      return $this->belongsTo(Product::class);
    }

}
