<?php

use App\Mail\TestMail;

Route::get('test/email', function () {
    \Mail::to('maxiyanez84@gmail.com')->send(new TestMail);
});

Route::view('/', 'welcome');

// Authentication
Route::group(['namespace' => 'Auth', 'prefix' => 'admin'], function()
{
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
});
//----------

// Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::redirect('/', '/admin/login');

    //sliders
    Route::resource('sliders', 'SliderController', ['only' => ['edit', 'update']]);

    //clientes
    Route::get('clientes/toCSV', 'ClientController@toCSV');

    //zonas
    Route::get('zones/json', 'ZoneController@json');
    Route::resource('zones', 'ZoneController');

    //subzonas
    Route::get('subzones/json', 'SubzoneController@json');
    Route::resource('zones.subzones', 'SubzoneController');
    Route::get('subzones/byZone', 'SubzoneController@byZone');

    //categorias
    Route::get('categories/json', 'CategoryController@json');
    Route::resource('categories', 'CategoryController');

    //subcategorias
    Route::get('subcategories/json', 'SubcategoryController@json');
    Route::resource('categories.subcategories', 'SubcategoryController');
    Route::get('subcategories/byCategory', 'SubcategoryController@byCategory');

    //productos
    Route::get('products/json', 'ProductController@json');
    Route::resource('products', 'ProductController');

    //stock
    Route::get('stock/json', 'StockController@json');
    Route::resource('stock', 'StockController');
    //Route::get('stock/create', 'StockController@create');
    //Route::post('stock', 'StockController@store');

    //prices
    Route::get('precios', 'PriceController@create');
    Route::post('prices', 'PriceController@store');

    //compras
    Route::get('purchases/toExcel', 'PurchaseController@toExcel');
    Route::get('purchases/json', 'PurchaseController@json');
    Route::get('items/json', 'PurchaseController@itemsToJson');
    Route::resource('purchases', 'PurchaseController');
    Route::get('purchases/{purchase}/toPDF', 'PurchaseController@toPDF');

    //shipping
    Route::get('shipping', 'ShippingController@index');
    Route::get('shipping/{purchase}/toPDF', 'ShippingController@toPDF');

    //manejo de imagenes
    Route::patch('images/{image}', 'ImageController@update');
    Route::post('images/upload', 'ImageController@upload');
    Route::post('images/{image}/delete', 'ImageController@destroy');

    //orden
    Route::post('sort/{table}', 'SortController');
});
//----------

//Front
Route::group(['namespace' => 'Front'], function()
{
    //statics
    Route::get('/', 'HomeController');
    Route::view('aboutus', 'front.static.aboutus');
    Route::view('faq', 'front.static.faq');
    // Route::view('metodos', 'front.static.methods');

    Route::view('contacto', 'front.static.contact');
    Route::post('contacto', 'ContactController@send');

    //Newsletter
    Route::post('newsletter', 'NewsletterController');

    //Busqueda
    Route::get('busqueda', 'ProductController@search');

    Route::get('productos', 'ProductController@index');

    //Producto (show)
    Route::get('productos/{subcategory}/{slug?}', 'ProductController@show')
        ->where('subcategory', '[a-z0-9_-]+')
        ->where('slug', '[a-z0-9_-]+')
    ;

    //Carrito
    Route::get('carrito', 'CartController@show');
    Route::get('carrito/envio', 'CartController@shipping');
    Route::get('carrito/medio-de-pago', 'CartController@paymentMethod');
    Route::get('carrito/checkout', 'CartController@checkout');

    Route::post('cart/step1', 'CartController@step1');
    Route::post('cart/step2', 'CartController@step2');
    Route::post('cart/add/{product}', 'CartController@add');
    Route::post('cart/remove', 'CartController@remove');
    Route::post('cart/refresh', 'CartController@refresh');
    Route::post('cart/apply-discount', 'CartController@applyDiscount');

    //Compra
    Route::post('preparar-compra', 'PurchaseController@prepare');
    Route::post('comprar', 'PurchaseController@pay');
    Route::get('compra-exitosa', 'PurchaseController@success');

    //Cliente
    Route::get('perfil/registro', 'ClientController@getRegistro');
    Route::post('perfil/registro', 'ClientController@postRegistro');
    Route::get('perfil/login', 'ClientController@getLogin');
    Route::post('perfil/login', 'ClientController@postLogin');
    Route::get('perfil/logout', 'ClientController@logout');

    //solicitar nuevo pass
    Route::get('perfil/recuperar-password', 'ClientController@showLinkRequestForm');
    Route::get('perfil/password-enviado', 'ClientController@resetPasswordEmailSent');
    Route::post('perfil/reset-password', 'ClientController@sendResetLinkEmail');

    //generar nuevo pass
    Route::get('perfil/nuevo-password/exito', 'ClientController@resetPasswordSuccess');
    Route::get('perfil/nuevo-password/{token}', 'ClientController@resetPasswordForm');
    Route::post('perfil/nuevo-password', 'ClientController@resetPassword');

    //Categoría (show)
    Route::get('{category}', 'CategoryController@show')
        ->where('category', '[a-z0-9_-]+')
    ;


    //Subcategoría (show)
    Route::get('{category}/{subcategory}', 'SubcategoryController@show')
        ->where('category', '[a-z0-9_-]+')
        ->where('subcategory', '[a-z0-9_-]+')
    ;
});
