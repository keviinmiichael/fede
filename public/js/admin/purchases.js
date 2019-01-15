var Purchases = (function (w, $, undefined) {

    function init () {
        dtInit();
        $('#left-panel li[data-nav="purchases"]').addClass('active');
    }

    var paymentStates = {
        1:{label:'danger', value:'Pendiente'},
        2:{label:'success', value:'Saldada'},
        3:{label:'warning', value:'Cancelda'},
    }

    var extraButtons = [
        {'title': 'Detalle', 'class': 'btn-info', 'href': '/admin/purchases/${row.id}', 'icon': 'fa-eye'},
        {'title': 'Imprimir', 'class': 'btn-success', 'href': '/admin/purchases/${row.id}/toPDF', 'icon': 'fa-print'}
    ]

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'purchases',
            columns: [
                'id',
                'created_at|moment:DD-MM-YYYY',
                'client_name',
                'client_fullname',
                'total',
                'payment_status_id|stateSwitcher:'+JSON.stringify(paymentStates),
                'id|actions:'+JSON.stringify(extraButtons)
            ],
            order: [[ 0, "desc" ]],
            fnDrawCallback: function () {
                $('a[data-original-title="Editar"]').remove();
            }
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
    Purchases.init();
});
