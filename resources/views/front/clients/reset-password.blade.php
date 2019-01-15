@extends('front.app')

@section('title', 'Recuperar contraseña')

@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--login form-->
						<h2>Recuperar contraseña</h2>
						<form method="post" action="/perfil/reset-password">
			            	{{ csrf_field() }}
							<input name="email" type="text" placeholder="Email" value="{{old('email')}}"/>
							<input name="email_confirmation" type="text" placeholder="Confirmar email" value="{{old('email_confirmation')}}"/>
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
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection
