<?php

namespace App;
use App\CartDetail;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //un carrito tendra muchos detalles
    public function details()
    {
      
      return $this->hasMany(CartDetail::class);
    }
}
