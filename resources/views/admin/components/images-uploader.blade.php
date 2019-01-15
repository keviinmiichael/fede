<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- COLUMNA PRINCIPAL -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid">

            <!-- Widget listas -->
            <div 
                class="jarviswidget jarviswidget-color-darken" 
                id="widgetImagesUploader" 
                data-widget-colorbutton="false" 
                data-widget-editbutton="false" 
                data-widget-togglebutton="false" 
                data-widget-deletebutton="false" 
                data-widget-sortable="false" 
                data-widget-fullscreenbutton="false"
            >
                <header>
                    
                    <h2>Im&aacute;genes</h2>
                    <div class="widget-toolbar" style="display: none"> 
                        <div class="progress progress-striped active" rel="tooltip" data-original-title="0%" data-placement="bottom">
                            <div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%">0 %</div>
                        </div>
                    </div>
                </header>

                <!-- widget div-->
                <div role="content">

                    <div class="widget-body no-padding">

                        <div class="widget-body-toolbar">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 text-right">
                                    <form id="imagesUploader" action="/admin/images/upload" method="post" enctype="multipart/form-data">
                                        <label class="btn btn-success" for="fileInput">Cargar imágenes</label>
                                        <input class="hidden" id="fileInput" onchange="ImageUploader.forceUpload(this);" type="file" name="images[]" multiple>
                                        <input class="hidden" type="submit" value="Upload">
                                        <input type="hidden" name="resource" value="{{$resource}}" />
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- row imagenes -->
                        <div class="row">

                            <!-- SuperBox -->
                            <div id="sliderImagenes" class="col-sm-12">
                                @if (!$model->images()->count())
                                    <p class="empty">No hay imágenes cargadas</p>
                                @endif
                                @php $data = [] @endphp
                                @foreach ($model->images as $image)
                                    <div style="display: none" class="superbox-list sortable" data-id="{{ $image->id }}">
                                        <a class="btn btn-mini btn-primary" data-id="{{ $image->id }}" style="display: none">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-mini btn-danger" data-id="{{ $image->id }}">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                        <img src="/content/{{$resource}}/thumb/{{ $image->src }}" class="superbox-img" />
                                    </div>
                                    @php $data[$image->id] = $image->toArray(); @endphp
                                @endforeach
                                <script>var Imagenes = {!!json_encode($data)!!}</script>
                                <div class="superbox-float"></div>
                            </div>
                            <!-- /SuperBox -->

                        </div>
                        <!-- end row imagenes -->
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>

<textarea class="hidden" id="superboxItem">
    <div style="display: none" class="superbox-list sortable" data-id="${id}">
        <a class="btn btn-mini btn-primary" data-id="${id}" style="display: none">
            <i class="fa fa-pencil"></i>
        </a>
        <a class="btn btn-mini btn-danger" data-id="${id}">
            <i class="fa fa-trash-o"></i>
        </a>
        <img src="${src}" class="superbox-img" />
    </div>
</textarea>

@php $editable = isset($editable) ? 1 : 0; @endphp

@push('scripts')
<script>
    var ImageUploader = (function ($, w, undefined) {
        
        var Imagenes = {};
        var resource = "{{$resource}}";
        var superboxItem =  $('#superboxItem').val();
        var formImagen =  $('#formImagen').val();

        function init (images) {
            Imagenes = images
            ajaxFileUpload();
            $('#sliderImagenes').sortable({
                start: function(e, ui){ui.placeholder.height(30);},
                stop: function (e, ui) {ordenar();},
                items: '.sortable'
            });
            $('#sliderImagenes').on('click', '.btn-danger', function () {
                borrar($(this));
            });
            $('#sliderImagenes').on('click', '.btn-primary', function () {
                editar($(this));
            });
            $('#sliderImagenes .superbox-list').show();
            if ( {{$editable}} ) $('.superbox-list .btn-primary').show();
        }

        function ajaxFileUpload () {
            var html, images;
            $('#imagesUploader').ajaxForm({
                beforeSend: function() {
                    $('#widgetImagesUploader .widget-toolbar, #widgetImagesUploader .jarviswidget-loader').show();
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    if (percentVal == '100%') percentVal = '99%';
                    $('#widgetImagesUploader .widget-toolbar .progress').attr('data-original-title', percentVal);
                    $('#widgetImagesUploader .progress-bar').width(percentVal).html(percentVal);
                },
                success: function (data) {
                    images = data.images;
                    if (images.length) {
                        html = '';
                        for (var i=0, l=images.length; i<l; i++) {
                            html += superboxItem.replace('${src}', '/content/'+resource+'/thumb/'+images[i].src)
                                .replace(/\$\{id\}/g, images[i].id);
                            $('#form').append('<input type="hidden" name="imagesIds[]" value="'+images[i].id+'" />');
                            Imagenes[images[i].id] = images[i];
                        }
                        $('#sliderImagenes').append(html);
                        if ( {{$editable}} ) $('.superbox-list .btn-primary').show();
                        $('#sliderImagenes').find('.superbox-list:hidden').fadeIn();
                        if ($('#sliderImagenes .superbox-list').length) $('#sliderImagenes .empty').hide();
                    }
                    $('#widgetImagesUploader .widget-toolbar, #widgetImagesUploader .jarviswidget-loader').hide();
                    $('#widgetImagesUploader .widget-toolbar .progress').attr('data-original-title', '0%');
                    $('#widgetImagesUploader .progress-bar').width('0%').html('0%');
                },
                error: function (a, b, c) {
                    Box.small({title: 'Error', content: 'La imagen es demasiado pesada o el formato no es el correcto'}).error().show();
                    $('#widgetImagesUploader .widget-toolbar, #widgetImagesUploader .jarviswidget-loader').hide();
                    $('#widgetImagesUploader .widget-toolbar .progress').attr('data-original-title', '0%');
                    $('#widgetImagesUploader .progress-bar').width('0%').html('0%');
                }
            });
        }

        //ordenar
        function ordenar () {
            var data = '', id;
            $('#sliderImagenes .sortable').each(function (i) {
                data += '&order[]='+i;
                data += '&id[]='+$(this).attr('data-id');
            })
            $.ajax({
                type:'POST',
                url:'/admin/sort/images',
                data: 'data'+data
            })    
        }

        //borrar
        function borrar ($this) {
            var id = $this.data('id');
            borrarModalInit();
            $('#modalBorrar').modal('show');
            $('#modalBorrar button.action').unbind('click').click(function () {
                loaderModalInit();
                $.ajax({
                    type:'post',
                    url: '/admin/images/'+id+'/delete',
                    success: function () {
                        $('#modalBorrar').modal('hide');
                        $this.parent().fadeOut(
                            500,
                            function () {
                                $this.parent().remove();
                                if (!$('#sliderImagenes .superbox-list').length) $('#sliderImagenes .empty').show();
                            }
                        );
                    }
                });
            });
        }

        //editar
        function editar ($this) {
            editModalInit($this);
            $('#modalEdit').modal('show');
            $('#modalEdit button.action').unbind('click').click(function () {
                var data = $('#modalEdit form').serialize();
                loaderModalInit();
                $.ajax({
                    type:'patch',
                    url: '/admin/images/'+$this.data('id'),
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            Imagenes[$this.data('id')] = response.image;
                        }
                        $('#modalEdit').modal('hide');                    
                    }
                })
            })
        }

        function borrarModalInit () {
            $('#modalBorrar .modal-title .text').html('Borrar');
            $('#modalBorrar .modal-title .jarviswidget-loader').hide();
            $('#modalBorrar .modal-body .content').html('<p>¿Está seguro que desea borrar este item?</p>');
            $('#modalBorrar button.action').attr('data-id', false);
            $('#modalBorrar .modal-footer button').attr('disabled', false);
            $('#modalBorrar .modal-footer button.btn-default').show();
            $('#modalBorrar .modal-dialog').css('width', '');
        }

        function loaderModalInit() {
            $('#modalBorrar .modal-title .jarviswidget-loader').show();
            $('#modalBorrar .modal-body .content').html('Por favor espere...');
            $('#modalBorrar .modal-footer button').attr('disabled', true);
        }

        function editModalInit ($imagen) {
            var info = Imagenes[$imagen.data('id')];
            form = formImagen;
            for (var i in info) {
                form = form.replace('${'+i+'}', info[i]);
            }
            form = form.replace(/\$\{[a-zA-Z0-9_-]+\}/g, '');
            $('#modalEdit .modal-title .text').html('Editar');
            $('#modalEdit .modal-title .jarviswidget-loader').hide();
            $('#modalEdit .modal-body .content').html(form);
            $('#modalEdit .modal-footer button.action').removeClass('btn-danger').addClass('btn-success').html('Guardar');
            $('#modalEdit .modal-footer button').attr('disabled', false);
            $('#modalEdit .modal-footer button.btn-default').show();
        }

        return {
            forceUpload: function (el) {
                $(el).parents('form').find('input[type="submit"]').trigger('click');
            },
            init: function (images) {
                init(images);
            }
        }

    })(jQuery, window);
    ImageUploader.init(Imagenes);
</script>
@endpush