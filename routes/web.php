<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'TestController@welcome');
/**
 * Las siguientes ds rutas o lineas , se generan apartir el sistema de autenticacion
 * que se logra por emitir el comando php artisan make:auth , con ello se genera
 * lo archivos y vistas de registro,login y sus respectivos enlaces en la vista welcome
 * no se debe eliminar o comentar la linea Auth::routes();
 */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');//Muestra el formulario para editar producto

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
Route::post('/order', 'CartController@update');
/**
 * Rutas-Panel-Admin
 * Se ha definido el grupo de rutas para que pasan por el filtro de los middleware auth (para validar si se ha inicado session)
 * y proceder con el middle admin para validar el tipo de usuario ( debe ser admin).
 * Se ha agregado el metodo prefix('admin') para evitar escribir por cada ruta de este grupo Route::get('/admin/products', 'ProductController@index');
 * Al usar el metodo namespace('Admin') se evita escribit Admin\ por cada ruta Route::get('/products', 'Admin\ProductController@index');
 */
 Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
   /**
    * Rutas para la Gestion de productos
    */
   Route::get('/products', 'ProductController@index');//Listado
   Route::get('/products/create', 'ProductController@create');//Muestra el formulario para crear producto
   Route::post('/products', 'ProductController@store');//almacenar datos del producto
   Route::get('/products/{id}/edit', 'ProductController@edit');//Muestra el formulario para editar producto
   Route::post('/products/{id}/edit', 'ProductController@update');//Actualizar datos del producto
   Route::delete('/products/{id}', 'ProductController@delete');//Actualizar datos del producto

   Route::get('/products/{id}/images', 'ImageController@index');//Listar imagenes Por id De Producto
   Route::post('/products/{id}/images', 'ImageController@store');//Registrar
   Route::delete('/products/{id}/images', 'ImageController@destroy');//Registrar
   Route::get('/products/{id}/images/select/{image}', 'ImageController@select');//Destacar imagenes

   /**
    * Rutas para la gestion de Categorias
    */
    Route::get('/categories', 'CategoryController@index');//Listado
    Route::get('/categories/create', 'CategoryController@create');//Muestra el formulario para crear producto
    Route::post('/categories', 'CategoryController@store');//almacenar datos del producto
    Route::get('/categories/{category}/edit', 'CategoryController@edit');//Muestra el formulario para editar producto
    Route::post('/categories/{category}/edit', 'CategoryController@update');//Actualizar datos del producto
    Route::delete('/categories/{category}', 'CategoryController@delete');//Actualizar datos del producto

 });
