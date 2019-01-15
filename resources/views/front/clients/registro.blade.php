@extends('front.app')

@section('title', 'Registro')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Registro de usuario</h1>
		</div>
	</div>
	<br><br>
	<div class="row">
       <div class="col-md-8 col-md-offset-2">
            <form method="post" action="/perfil/registro">
            	{{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Datos Personales</legend>
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Apellido</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellido">
                            </div>
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Datos de envío</legend>
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Ej.: Av. Figuero Alcorta 2263 3°B">
                            </div>
                            <div class="form-group">
                                <label for="localidad">Localidad / Ciudad</label>
                                <input type="text" class="form-control" name="localidad" id="localidad" placeholder="Localidad">
                            </div>
                            <div class="form-group">
                                <label for="provincia">Provincia</label>
                                <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Provincia">
                            </div>
                            <div class="form-group">
                                <label for="zip_code">Código Postal</label>
                                <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Código Postal">
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                	<div class="col-md-12 text-center">
                		<input class="btn btn-primary" type="submit" name="enviador" value="Registrarse">
                	</div>
                </div>
                @if (request()->has('checkout'))
                    <input type="hidden" name="checkout" value="true">
                @endif
            </form>
       </div>
   </div>
@endsection