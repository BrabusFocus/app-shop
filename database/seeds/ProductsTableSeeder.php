<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        factory(Product::class)->make(); El metodo make Crea objetos
        factory(Product::class)->create(); El meodo Create Crea obbjeto y lo guarda en la BD
        sin espeficar la cantidad de registro, por defecto solo insertara un registro
        Para este caso se ha defino 100 registros
        */
        // factory(Category::class,5)->create();
        // factory(Product::class,100)->create();
        // factory(ProductImage::class,200)->create();
        /**
         * Model Factories Relacionales
         */
         $categorias = factory(Category::class,4)->create();
         $categorias->each(function ($categoria) {
           $products = factory(Product::class,5)->make();//crea y devuelte el objeto
           $categoria->products()->saveMany($products);//Metodo que realiza la relacion entre los modelos Categoria y producto

           //imagens para los productos
           $products->each(function ($product) {
             $images = factory(ProductImage::class,3)->make();
             $product->images()->saveMany($images);
           });
         });
         // $users = factory(App\User::class, 3)
         //   ->create()
         //   ->each(function ($u) {
         //        $u->posts()->save(factory(App\Post::class)->make());
         //    });
    }
}
