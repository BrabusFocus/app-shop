<?php

namespace Facrinama\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     /**
      * Manejar la solictudes entrantes
      */
    public function handle($request, Closure $next)
    {
      /**
       * Si el usuairo no es admin redireccionar
       */
        if (!auth()->user()->admin) {
          return redirect('/');
        }
        /**
         * Que proceda con ejecucion de otro Middleware
         * Los middle se ejecutan otro tras otro.
         */
        return $next($request);
    }
}
