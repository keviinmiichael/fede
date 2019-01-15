var DT = (function (w, $, undefined) {

    var dataTable, currentRow = 0,
        responsiveHelper_dt_basic = undefined,
        breakpointDefinition = {
            tablet : 1024,
            phone : 480
        },
        settings
    ;

    function create (selector, options) {
        settings = options;
        settings['preDrawCallback'] = options.preDrawCallback || function() {};
        settings['rowCallback'] = options.rowCallback || function() {};
        settings['fnDrawCallback'] = options.fnDrawCallback || function() {};
        dataTable = $(selector).DataTable({
             "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth" : true,
            processing: false,
            serverSide: true,
            stateSave: false,
            ajax: {
                url: '/admin/'+settings.resource+'/json',
                data: function(d) {
                    if (settings.data) {
                        for (var i in settings.data)
                        d[i] = settings.data[i];
                    }
                }
            },
            fnServerParams: function(data) {
                  data['order'].forEach(function(items, index) {
                      data['order'][index]['column'] = data['columns'][items.column]['data'];
                });
            },
            aoColumns: getColumns(),
            language: window.dtLanguage,
            preDrawCallback: function() {
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($(selector), breakpointDefinition);
                }
                settings.preDrawCallback();
            },
            rowCallback: function(nRow, aData) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
                settings.rowCallback(nRow, aData);
            },
            fnDrawCallback: function(oSettings) {
                $('a[rel="tooltip"]').tooltip();
                $('.datatable_filter input').focus();
                responsiveHelper_dt_basic.respond();
                settings.fnDrawCallback(oSettings);
                //if (settings.columns.join().indexOf('stateSwitcher') != -1) stateSwitcher.onChange();
                if (settings.columns.join().indexOf('actions') != -1) actions.onDelete();
            },
            columnDefs: generateColumns(),
            order: settings.order || [[ 1, "desc" ]]
        });
    }

    function getColumns () {
        var result = [], column;
        for (var i in settings.columns) {
            column = settings.columns[i].split('|', 1).join('');
            result.push({
                mData: column,
                //sTitle: column
            });
        }
        return result;
    }

    function generateColumns() {
        var result = [], column;
        for (var i=0, l=settings.columns.length; i<l; i++) {
            var item = {};
            column = settings.columns[i];
            item['targets'] = i;
            if (settings.columns[i].indexOf('|') != -1) {
                item['render'] = (function (column) {
                    return function (d, type, row) {
                        return applyFilter(column, row);
                    };
                })(column);
            } else {
                item['render'] = (function (column) {
                    return function (d, type, row) {
                        return row[column];
                    };
                })(column);
            }
            result.push(item);
        }

        return result;
    }

    // title|limit:50

    function applyFilter(column, row) {
        var options = column.split('|');
        var filter = (options[1].indexOf(':') != -1)?options[1].split(':')[0]:options[1];
        return filters[filter](row, options[0], options[1]);
    }

    var filters = {
        image: function (row, prop, parameters) {
            var path = (parameters.indexOf(':') != -1) ? parameters.split(':')[1] : false;
            return image.render(row[prop], path);
        },
        limit: function (row, prop, parameters) {
            var length = (parameters.indexOf(':') != -1) ? parameters.split(':')[1] : 34;
            var text = row[prop] || '';
            return (text.length > length)?'<a href="javascript:void(0);" rel="tooltip" data-placement="top" data-original-title=\''+text+'\' data-html="false">'+text.substring(0, length)+'...'+'</a>':text;
        },
        stateSwitcher: function (row, prop, parameters) {
            var index = parameters.indexOf(':'), instace = new StateSwitcher(prop);
            if (index != -1) {
                var states = JSON.parse(parameters.slice(index+1));
                instace.setState(states);
            }
            instace.onChange(row);
            return instace.render(row[prop], row);
        },
        label: function (row, prop, parameters) {
            var index = parameters.indexOf(':'), instace = new StateSwitcher(prop);
            if (index != -1) {
                var states = JSON.parse(parameters.slice(index+1));
                instace.setState(states);
            }
            //instace.onChange(row);
            return instace.render(row[prop], row);
        },
        actions:  function(row, prop, parameters) {
            var buttons = actions.render(row);
            var index = parameters.indexOf(':');
            if (index != -1) {
                var options = JSON.parse(parameters.slice(index+1));
                buttons = actions.extraButtons(row, prop, options);
            }
            return buttons.replace(/\$\{[a-zA-Z0-9\._-]+\}/g, '');
        },
        callback: function (row, prop, parameters) {
            var index = parameters.indexOf(':');
            var callback = parameters.slice(index+1);
            return eval(callback);
        },
        moment: function (row, prop, parameters) {
            var format = parameters.split(':')[1];
            return moment(row[prop]).format(format)
        }
    }

    //IMAGEN
    var image = {
        defaultImage: 'imagen-no-disponible.jpg',
        render: function (imagen, path) {
            var time = (new Date).getTime(), path;
            imagen = imagen || this.defaultImage;
            imagen += '?'+time;
            path = (path) ? path + imagen : '/content/' + settings.resource + '/thumb/' + imagen;
            return '\
                <a href="javascript:void(0);" rel="tooltip" data-placement="top" data-original-title="<img width=\'150\' src=\''+path+'\' class=\'online\'>" data-html="true">\
                     <img style="width:30px; border: solid 1px #ccc" src="'+path+'"\
                </a>\
            ';
        }
    }
    //FIN IMAGEN

    //ESTADO
    function StateSwitcher (prop) {
        this.addEvent = false;
        this.prop = prop;
        this.states = {
            0:{label:'danger', value:'Oculto'},
            1:{label:'success', value:'Visible'}
        }
        this.setState = function (states) {
            this.states = states;
        }
        this.render = function (index, row) {
            var currentState = this.states[index];
            var instace = this;
            return '<span id="'+this.prop+row.id+'" data-id="'+row.id+'" data-estado="'+index+'" class="'+this.prop+' switch-state label label-'+currentState.label+'">'+currentState.value+'</span>'
        }
        this.onChange = function(row) {
            var $this, estado_id, state, waiting = false, data = {}, instace = this;
            $('#datatable').off('click', '#'+this.prop+row.id).on('click', '#'+this.prop+row.id, function () {
                $this = $(this);
                estado_id = instace.nextState($this.data('estado'));
                data[prop] = estado_id;
                data['id'] = $this.data('id');
                if (!waiting) {
                    waiting = true;
                    $.ajax({
                        type:'put',
                        url:settings.resource+'/'+$this.data('id'),
                        data:data,
                        success: function (object) {
                            $this.replaceWith(instace.render(estado_id, object));
                            waiting = false;
                        }
                    });
                }
            });
        }
        this.nextState = function (index) {
            var indexes = [], i = 0, currentIndex, state;
            for (var key in this.states) {
                indexes.push(key);
                if (key == index) currentIndex = i;
                i++;
            }
            return (++currentIndex >= i)?indexes[0]:indexes[currentIndex];
        }
    }
    function nextState(index) {
        var indexes = [], i = 0, currentIndex, state;
        for (var key in stateSwitcher.states) {
            indexes.push(key);
            if (key == index) currentIndex = i;
            i++;
        }
        return (++currentIndex >= i)?indexes[0]:indexes[currentIndex];
    }
    //FIN ESTADO

    //ACCIONES
    var actions = {
        tpl: '',
        render: function (row) {
            this.tpl = '\
                <a href="'+settings.resource+'/'+row.id+'/edit" title="Editar" rel="tooltip" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>\
                ${extraButtons}\
                <a data-id="'+row.id+'" title="Borrar" rel="tooltip" class="borrar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>\
            ';
            return this.tpl;
        },
        extraButtons: function (row, prop, options) {
            var button, value, i, attr, matches, regex = /\$\{row\.([a-zA-Z0-9_]+)\}/g;
            var anchor = '<a rel="tooltip" class="btn btn-sm ${class}" ${attr}><i class="fa ${icon}"></i></a>';
            for (i in options) {
                button = options[i];
                tpl = anchor;
                for (attr in button) {
                    value = button[attr];
                    if (attr == 'class' || attr == 'icon') {
                        tpl = tpl.replace('${'+attr+'}', value);
                    } else {
                        tpl = tpl.replace('${attr}', attr+'="'+value+'" '+'${attr}');
                    }
                }
                while ((matches = regex.exec(tpl)) !== null) {
                    tpl = tpl.replace(matches[0], row[matches[1]]);
                }
                this.tpl = this.tpl.replace('${extraButtons}', tpl+' ${extraButtons}');
            }
            this.tpl = this.tpl.replace('${extraButtons}', '');
            return this.tpl;
        },
        onDelete: function() {
            var $this, id;
            $('.borrar').on('click', function(e) {
                e.preventDefault();
                $this = $(this);
                id = $(this).attr('data-id');
                modals.delete.init().show();
                $('#modalBorrar .action').click(function () {
                    $('#modalBorrar .modal-footer button').unbind('click');
                    modals.loader();
                    $.ajax({
                        type:'delete',
                        url: settings.resource+'/'+id,
                        success: function (response) {
                            modals.delete.hide();
                            if (response.success) {
                                $this.parents('tr').fadeOut(
                                    500,
                                    function () {
                                        $this.parents('tr').remove();
                                        if ($('#datatable tbody tr').length == 0) {
                                            dataTable.ajax.reload();
                                        }
                                    }
                                );
                            } else {
                                Box.small({title: response.error}).error().show();
                            }
                        }
                    });
                });
            });
        }
    }
    //FIN ACCIONES

    //MODALS
    var modals = {
        delete: {
            init: function () {
                $('#modalBorrar .modal-title .text').html('Borrar');
                $('#modalBorrar .modal-title .jarviswidget-loader').hide();
                $('#modalBorrar .modal-body .content').html('<p>¿Está seguro que desea borrar este item?</p>');
                $('#modalBorrar button.action').attr('data-id', false);
                $('#modalBorrar .modal-footer button').attr('disabled', false);
                $('#modalBorrar .modal-footer button.btn-default').show();
                $('#modalBorrar .modal-dialog').css('width', '');
                return this;
            },
            show: function () {
                $('#modalBorrar').modal('show');
            },
            hide: function () {
                $('#modalBorrar').modal('hide');
            }
        },
        loader: function () {
            $('#modalBorrar .modal-title .jarviswidget-loader').show();
            $('#modalBorrar .modal-body .content').html('Por favor espere...');
            $('#modalBorrar .modal-footer button').attr('disabled', true);
            return this;
        }
    }
    //FIN MODALS

    return {
        create : function (selector, data) {
            create(selector, data);
        }
    }
})(window, jQuery, undefined);