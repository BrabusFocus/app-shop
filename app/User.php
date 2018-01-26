<?php

namespace Facrinama;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Facrinama\Cart;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Relacion del modelo Usuario  y carts (carrito)
     */
    public function carts()
    {
      return  $this->hasMany(Cart::class);
    }
    /**
     * Acceso (campo calculado)
     */
    public function getCartAttribute()
    {
      $cart = $this->carts()->where('status','Active')->first();
      if ($cart) {
        return $cart;
      }

      $cart = new Cart();
      $cart->status = 'Active';
      $cart->user_id = $this->id;
      $cart->save();
      /**
       * devueve el carrtio creado
        */
        return $cart;
    }
}
