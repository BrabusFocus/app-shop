<?php

namespace App;
use App\CartDetail;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //un carrito tendra muchos detalles
    public function details()
    {

      return $this->hasMany(CartDetail::class);
    }

    //un carrito pertece a un usuario
    public function user()
    {

      return $this->belongsTo(User::class);
    }
}
