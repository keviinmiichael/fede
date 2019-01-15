<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <title></title>
    <!-- <style> -->
  </head>
  <body>
    <span class="preheader"></span>
    <table class="body">
      <tr>
        <td class="center" align="center" valign="top">
          <center data-parsed="">
            <style type="text/css" align="center" class="float-center">
              body,
              html,
              .body {
                background: #f3f3f3 !important;
              }
            </style>

            <table align="center" class="container float-center"><tbody><tr><td>

              <table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td></tr></tbody></table>

              <table class="row"><tbody><tr>
                <th class="small-12 large-12 columns first last"><table><tr><th>
                  <h1><img src="{{url('img/front/home/logo.png')}}" alt="{{env('APP_NAME')}}" class="img-responsive" ></h1>
                  <p>Contacto</p>

                  <table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td></tr></tbody></table>

                  <table class="callout"><tr><th class="callout-inner secondary">
                    <table class="row"><tbody><tr>
                      <th class="small-12 large-12 columns first"><table><tr><th>
                        <p>
                          <strong>Datos personales</strong><br>
                          Nombre: {{ $datos->nombre }} <br>
                          Mail: {{ $datos->email }} <br>
                          Tel: {{ $datos->telefono }}
                        </p>
                        <p>
                          <strong>Mensaje</strong><br>
                          {!! nl2br($datos->comentarios) !!}
                        </p>
                      </th></tr></table></th>
                    </tr></tbody></table>
                  </th><th class="expander"></th></tr></table>
                </th></tr></table></th>
              </tr></tbody></table>

            </td></tr></tbody></table>

          </center>
        </td>
      </tr>
    </table>
    <!-- prevent Gmail on iOS font size manipulation -->
   <div style="display:none; white-space:nowrap; font:15px courier; line-height:0;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div>
  </body>
</html>
