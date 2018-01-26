<?php

namespace Facrinama;
use Facrinama\CartDetail;
use Facrinama\User;
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

    public function getTotalAttribute()
    {
      $total = 0;
      foreach ($this->details as $detail) {
        $total += $detail->quantity * $detail->product->price;
      }
      return $total;
    }
}
