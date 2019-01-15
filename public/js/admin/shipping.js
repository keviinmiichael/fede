var Shipping = (function (w, $, undefined) {

    function init () {
        dtInit();
        $('#left-panel li[data-nav="shipping"]').addClass('active');
    }

    var shippingStates = {
        1:{label:'danger', value:'Pendiente'},
        2:{label:'success', value:'Enviado'},
        5:{label:'warning', value:'Canceldo'},
    }

    var extraButtons = [
        {'title': 'Detalle', 'class': 'btn-info', 'href': '/admin/purchases/${row.id}', 'icon': 'fa-eye'},
        {'title': 'Imprimir', 'class': 'btn-success', 'href': '/admin/purchases/${row.id}/toPDF', 'icon': 'fa-print'}
    ]

    var callback = ""

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'purchases',
            columns: [
                'id',
                'total',
                'created_at|moment:DD-MM-YYYY',
                'client_name|limit',
                'zone',
                'shipping_status_id|stateSwitcher:'+JSON.stringify(shippingStates),
                'id|callback:(function (row, prop, parameters) {return \'<a rel="tooltip" class="btn btn-sm btn-info" title="Ver compra" href="/admin/purchases/\'+row.id+\'"><i class="fa fa-eye"></i></a> <a rel="tooltip" class="btn btn-sm btn-success" title="Ver envío" href="/admin/shipping/\'+row.id+\'/toPDF"><i class="fa fa-print"></i></a>\'})(row, prop, parameters)'
            ],
            order: [[ 0, "desc" ]]
        });
    }
    //fin Data Table

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Shipping.init();
});
