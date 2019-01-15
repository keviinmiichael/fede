<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('sliders')->insert(['name' => 'Home']);

        DB::table('shipping_status')->insert([
            ['value' => 'Pendiente'],
            ['value' => 'En proceso'],
            ['value' => 'Recibido'],
            ['value' => 'Entregado'],
            ['value' => 'Cancelado']
        ]);

        DB::table('payment_status')->insert([
            ['value' => 'Pendiente'],
            ['value' => 'Pagado'],
            ['value' => 'Cancelado']
        ]);

        DB::table('categories')->insert([
            ['value' => 'Flores', 'slug' => 'flores'],
            ['value' => 'Regalos', 'slug' => 'regalos']
        ]);

        DB::table('subcategories')->insert([
            ['value' => 'Rosa', 'slug' => 'rosa', 'category_id' => 1],
            ['value' => 'Claveles', 'slug' => 'claveles', 'category_id' => 1],
            ['value' => 'Rosa disecada en tubo', 'slug' => 'rosa-disecada-en-tubo', 'category_id' => 2],
            ['value' => 'Oso "te quiero"', 'slug' => 'oso-te-quiero', 'category_id' => 2],
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD'))
        ]);

        factory(App\Product::class, 10)->create();
    }
}
