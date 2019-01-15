@extends('front.app')

@section('title', 'Login')

@section('content')
<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>Login / Registro </h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="/">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li><a href="account-orders.html">Account</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>Login / Register</li>
      </ul>
    </div>
  </div>
</div>
<!-- Page Content-->
<div class="container padding-bottom-3x mb-2">
  <div class="row">
    <div class="col-md-6">
      <form class="login-box" method="post" action="/perfil/login">
	      {{ csrf_field() }}
        <h4 class="margin-bottom-1x">Soy Usuario Registrado</h4>
        <div class="form-group input-group">
          <input name="email" class="form-control" type="email" placeholder="Email" required><span class="input-group-addon" value="{{  session('login') ? old('email') : '' }}"><i class="icon-mail"></i></span>
        </div>
        <div class="form-group input-group">
          <input name="password" class="form-control" type="password" placeholder="Password" required><span class="input-group-addon"><i class="icon-lock"></i></span>
        </div>
        <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
          <a class="navi-link" href="/perfil/recuperar-password">¿Olvidaste tu contraseña?</a>
        </div>
        <div class="text-center text-sm-right">
          <button class="btn btn-primary margin-bottom-none" type="submit">Entrar</button>
        </div>
      </form>
  		@if ($errors->any() && session('login'))
  			<div class="alert alert-danger" style="margin-top:30px;">
  				<ul>
  					@foreach ($errors->all() as $error)
  						<li style="color: #b7280e; font-size: 16px">{{ $error }}</li>
  					@endforeach
  					<br>
  				</ul>
  			</div>
  		@endif
  		@if (session('pass'))
  			<div class="alert alert-danger" style="margin-top:30px;">
  				<ul>
  					<li style="color: #b7280e; font-size: 16px">Credenciales Incorrectas</li>
  					<br>
  				</ul>
  			</div>
  		@endif
    </div>
    <div class="col-md-6">
      <div class="padding-top-3x hidden-md-up"></div>
      <h3 class="margin-bottom-1x">Registrate</h3>
      <form class="row" method="post" action="/perfil/registro">
	      {{ csrf_field() }}
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-fn">Nombre Completo</label>
            <input class="form-control" type="text" id="reg-fn" required name="name" placeholder="Nombre" value="{{ old('name')}}">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-email">E-mail</label>
            <input class="form-control" type="email" id="reg-email" required name="email" placeholder="Email" value="{{  session('register') ? old('email') : '' }}">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-phone">Teléfono</label>
            <input class="form-control" type="text" id="reg-phone" required name="phone" placeholder="Teléfono" value="{{ old('phone')}}">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-pass">Password</label>
            <input class="form-control" type="password" id="reg-pass" required name="password" placeholder="Clave">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="reg-pass-confirm">Confirmar Password</label>
            <input class="form-control" type="password" id="reg-pass-confirm" required name="password_confirmation" placeholder="Confirmar Clave">
          </div>
        </div>
        <div class="col-5 text-center text-sm-right">
          <button class="btn btn-primary margin-bottom-none" type="submit">Registrarme</button>
        </div>
      </form>
			@if ($errors->any() && session('register'))
				<div class="alert alert-danger" style="margin-top:30px;">
					<ul>
						@foreach ($errors->all() as $error)
							<li style="color: #b7280e; font-size: 16px">{{ $error }}</li>
						@endforeach
						<br>
					</ul>
				</div>
			@endif
    </div>
  </div>
</div>
@endsection
