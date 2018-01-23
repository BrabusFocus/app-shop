<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use App\Mail\OrderMails;
use Illuminate\Support\Facades\Mail;
use App\Receiver;
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

      /**
       * Envio de correo
       */
      Mail::to(auth()->user()->email)->send(new OrderMails($cart));
      return back()->with(compact('notitication'));
    }

}
