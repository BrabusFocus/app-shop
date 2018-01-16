<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Pedido realiazado por el usuario
     */
    public function update()
    {
      $cart = auth()->user()->cart;
      $cart->status = 'Pending';
      $cart->save();//update

      $notitication = 'Pedido enviado correctamente. Te contactaremos por vía correo ';

      return back()->with(compact('notitication'));
    }

}
