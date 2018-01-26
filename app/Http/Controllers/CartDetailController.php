<?php

namespace Facrinama\Http\Controllers;

use Illuminate\Http\Request;
use Facrinama\CartDetail;
class CartDetailController extends Controller
{
    /**
     * El metedo getCartIdAttribute() es definido en el modelo Facrinama\User.php como campo de acceso o calculado.
     * Este metodo crea el carrito para el usuario autenticado (en la bd) y retorna el carrito previamente creado.
     */

    public function store(Request $request)
    {
     $cartDetail = new CartDetail();
     $cartDetail->cart_id = auth()->user()->getCartAttribute()->id;//Tambien se puede utilizar asi auth()->user()->cart_id
     $cartDetail->product_id = $request->product_id;
     $cartDetail->quantity = $request->quantity;
     $cartDetail->save();
     /**
      * Data Flash
      * Variable se sesion flash llamada notification
      */
      $notitication = 'El producto se ha añadido al carrito de compras exitosamente';
      return  back()->with(compact('notitication'));
    }

    public function destroy(Request $request)
    {

      $cartDetail = CartDetail::find($request->cart_detail_id);
      if ($cartDetail->cart_id === auth()->user()->cart->id) {
        $cartDetail->delete();
      }
     /**
      * Data Flash
      * Variable se sesion flash llamada notification
      */
      $notitication = 'El producto se ha eliminando del carrito de compras correctamente';
      return  back()->with(compact('notitication'));
    }

}
