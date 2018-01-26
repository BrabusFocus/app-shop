<?php

namespace Facrinama\Http\Controllers;
use Facrinama\Cart;
use Illuminate\Http\Request;
use Facrinama\Mail\NewOrder;
use Illuminate\Support\Facades\Mail;
use Facrinama\Receiver;
use Facrinama\User;
use Carbon\Carbon;//manipular fechas
class CartController extends Controller
{
    /**
     * Pedido realiazado por el usuario
     */
    public function update()
    {
      $client = auth()->user();
      $cart = $client->cart;
      $cart->status = 'Pending';
      $cart->order_date = Carbon::now();
      $cart->save();//update

      $notitication = 'Pedido enviado correctamente. Te contactaremos por vía correo ';

      /**
       * Envio de correo a todo los  Admin
       */
       $admins = User::where('admin',true)->get();
      Mail::to($admins)->send(new NewOrder($client,$cart));
      return back()->with(compact('notitication'));
    }

}
