@extends('front.app')

@section('title', 'Contacto')

@section('content')
    <section>
        <div id="contact-page" class="container">
            <div class="bg">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="title text-center">mapa de ubicación</h2>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13134.13742903527!2d-58.458294!3d-34.6159344!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb1b9bfd9633076b8!2sORDEN+NATURAL!5e0!3m2!1ses!2sar!4v1540673287678" height="300" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe><br><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="contact-info">
                            <h2 class="title">Info de contacto</h2>
                            <address>
                                <p><strong>Orden Natural</strong></p>
                                <p>Neuquen 1790 . Caballito,</p>
                                <p>Buenos Aires . Argentina.</p>
                                <p>Lun a Vie 9.00 a 21.00 hs</p>
                                <p>Sab y Dom 10.00 a 20.00 hs</p>
                                <p>Teléfono: +???</p>
                                <p>WhatsApp:  15-3436-7843 <a href="http://wa.me/5491134367843?text=¡Hola!%20Quisiera%20realizar%20un%20pedido."><img style="width:28px;" src="/img/front/wa.png" alt="WhatsApp"></a></p>
                                <p>mail:<a href="mailto:info@tujardinonline.com.ar"> info@tujardinonline.com.ar</a></p>
                            </address>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="contact-form">
                            <h2 class="title text-center">Consultas o sugerencias</h2>
                            <div class="status alert alert-success" style="display: none"></div>
                            <form action="contacto" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                                {{ csrf_field() }}
                                <div class="form-group col-md-6">
                                    <input type="text" name="nombre" class="form-control" required="required" placeholder="Nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea name="comentarios" id="message" required class="form-control" rows="8" placeholder="Comentarios"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Enviar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/#contact-page-->
    </section>
@endsection

@section('scripts')
    @if (session()->has('success'))
        <script>$.notify({message: 'Gracias por tus comentarios, en breve nos estaremos contactando.' },{type: 'success'});</script>
    @endif
@endsection
