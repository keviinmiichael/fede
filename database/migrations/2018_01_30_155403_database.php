<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Database extends Migration
{

    public function up()
    {
        //PRODUCTS <<relación>> tiene una relación polimórfica de uno a muchos con images
        Schema::create('products', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->string('slug')->unique();
            $table->string('code',50)->unique(); //código interno de indentificación que tiene el cliente.
            $table->float('price',8,2)->unsigned()->nullable();
            $table->float('cost',8,2)->unsigned();
            $table->smallInteger('profit_margin')->unsigned()->nullable();
            $table->smallInteger('discount')->unsigned()->nullable(); //en porcentaje
            $table->smallInteger('stock'); //El stock es la sumatoria del stock de las distintas variantes de un producto
            $table->smallInteger('category_id')->unsigned()->index(); //<<relación>> con category
            $table->smallInteger('subcategory_id')->nullable()->unsigned()->index(); //<<relación>> con subcategory
            $table->boolean('is_visible')->default(1);
            $table->boolean('home')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        //STOCK
        Schema::create('stock', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->smallInteger('product_id')->unsigned();
            $table->smallInteger('amount')->unsigned();
        });


        //PURCHASES
        Schema::create('purchases', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->float('total',8,2)->unsigned();
            $table->float('cost',8,2)->unsigned();
            $table->string('client_fullname')->nullable();
            $table->string('payMethod');
            $table->smallInteger('client_id')->nullable()->unsigned()->index(); //<<relación>> con clients
            $table->string('zone')->nullable(); //precio del envio
            $table->smallInteger('shipping')->nullable()->unsigned(); //precio del envio
            $table->tinyInteger('shipping_status_id')->default(1)->unsigned()->index(); //<<relación>> con shipping_status
            $table->tinyInteger('payment_status_id')->default(1)->unsigned()->index(); //<<relación>> con payment_status
            $table->string('mp_preference_id')->index();
            $table->text('mp_response')->nullable();
            $table->timestamps();
        });

        //SHIPPING STATUS (estados que puede tener un envio: pedida, enviada, recibida, etc)
        Schema::create('shipping_status', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('value', 50);
        });

        //SHIPPING STATUS (estados que puede tener un pago: pendiente, pago, cancelado, etc)
        Schema::create('payment_status', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('value', 50);
        });

        //ITEMS (productos en una compra)
        Schema::create('items', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name'); //nombre del producto (guarda el histórico)
            $table->float('price',8,2)->unsigned(); //por unidad
            $table->float('cost',8,2)->unsigned(); //por unidad
            $table->smallInteger('amount')->unsigned();
            $table->smallInteger('product_id')->unsigned()->index(); //<<relación>> con products
            $table->mediumInteger('purchase_id')->unsigned()->index(); //<<relación>> con purchase
        });

        //CATEGORIES
        Schema::create('categories', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('value');
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
        });

        //SUBCATEGORIES
        Schema::create('subcategories', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('value');
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
            $table->smallInteger('category_id')->nullable()->unsigned()->index(); //<<relación>> con categories
        });

        //CLIENTS
        Schema::create('clients', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',127);
            $table->string('email',127)->unique();
            $table->string('password');
            $table->string('phone',50)->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        //IMAGES
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('src');
            $table->integer('imageable_id')->nullable()->unsigned();
            $table->string('imageable_type', 80)->nullable();
            $table->tinyInteger('is_video')->default(0)->unsigned();
            $table->boolean('pending')->default(1);
            $table->smallInteger('order')->default(0)->unsigned();
            $table->timestamps();
            //indices
            $table->index(['imageable_id', 'imageable_type']);
            $table->index('order');
        });

        //IMAGES INFO
        Schema::create('images_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('value');
            $table->integer('image_id')->unsigned()->index();
        });

        //SLIDER <<relación>> tiene una relación polimórfica de uno a muchos con images
        Schema::create('sliders', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',127);
        });

        //ZONES
        Schema::create('zones', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',127);
            $table->softDeletes();
            $table->timestamps();
        });

        //SUBZONES
        Schema::create('subzones', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',127);
            $table->smallInteger('price');
            $table->smallInteger('zone_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->index('zone_id');
        });

        //NEWSLETTER
        Schema::create('newsletter', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('email');
            $table->timestamps();
        });

        //RELATED PRODUCTS
        Schema::create('related_products', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('product1_id')->unsigned();
            $table->smallInteger('product2_id')->unsigned();
            $table->integer('times')->unsigned()->default(1);

            $table->unique(['product1_id', 'product2_id']);
        });


    }

    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('stock');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('shipping_status');
        Schema::dropIfExists('payment_status');
        Schema::dropIfExists('items');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('images');
        Schema::dropIfExists('images_info');
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('subzones');
        Schema::dropIfExists('zones');
        Schema::dropIfExists('newsletter');
        Schema::dropIfExists('related_products');
    }
}
