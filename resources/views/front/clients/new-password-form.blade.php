@extends('front.app')

@section('title', 'Generar contraseña')

@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--login form-->
						<h2>Generar nueva contraseña</h2>
						@if ($success)
							<form method="post" action="/perfil/nuevo-password">
				            	{{ csrf_field() }}
				            	<input type="hidden" name="token" value="{{$token}}">
								<input name="password" type="password" placeholder="Contraseña" value="{{old('password')}}"/>
								<input name="password_confirmation" type="password" placeholder="Confirmar Contraseña" value="{{old('password_confirmation')}}"/>
								<button type="submit" class="btn btn-default">Enviar</button>
							</form>
							@if ($errors->any())
							    <div class="alert alert-danger" style="margin-top:30px;">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li style="color: #b7280e; font-size: 16px">{{ $error }}</li>
							            @endforeach
										<br>
							        </ul>
							    </div>
							@endif
						@else
							<p style="color: #b7280e; font-size: 16px">La url a la que trata de ingresar expiró.</p>
						@endif
						
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection
