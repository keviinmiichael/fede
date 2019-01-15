<!DOCTYPE html>
<html lang="es-ar">

    <head>
        @include('admin.partials.head')
    </head>

    <body class="hidden-menu">

    <!-- HEADER -->
    <header id="header">
        <div id="logo-group">
            <span style="margin-top:1px;margin-left:30px;" id="logo"> <img style="width:150px;" src="/img/admin/kc-logo-side.png" alt="KameCode"> </span>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- MAIN PANEL -->
    <div id="" role="main">
        <!-- MAIN CONTENT -->
            <div id="content" class="container">

                <div class="row" style="margin-top: 80px">
                    <div class="col-md-4 hidden-sm hidden-xs"></div>
                     <div class="col-md-4">
                        <div class="well no-padding">
                            <form action="/admin/login" method="post" id="login-form" class="smart-form client-form" role="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <header>
                                    Login
                                </header>

                                <fieldset>

                                    <section>
                                        <label class="label">Usuario</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="email" value="{{ old('email') }}" autofocus>
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingrese su nombre de usuario</b></label>
                                    </section>

                                    <section>
                                        <label class="label">Contraseña</label>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="password">
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese su contraseña</b> </label>
                                    </section>

                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">
                                        Entrar
                                    </button>
                                </footer>
                            </form>

                        </div>

                    </div>
                    <div class="col-md-4 hidden-sm hidden-xs"></div>
                </div>
            </div>
    </div>
    <!-- /MAIN PANEL -->

    @include('admin.partials.footer')

    @include('admin.partials.scripts')


</body>
</html>
