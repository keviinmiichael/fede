var Zones = (function (w, $, undefined) {

    function init () {
        dtInit();
        boxes();
        $('#left-panel li[data-nav="zones"]').addClass('active');
    }

    var extraButtons = [
        {'title': 'Subzonas', 'class': 'btn-success', 'href': '/admin/zones/${row.id}/subzones', 'icon': 'fa-list'}
    ]

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'zones',
            columns: [
                'name|limit',
                'id|actions:'+JSON.stringify(extraButtons)
            ]
        });
    }
    //fin Data Table

    function boxes () {
        Box.small({title: 'Perfecto', content:'La zona se cargó con éxito.'}).success().showIfHash('new');
        Box.small({title: 'Perfecto', content:'La zona se editó con éxito.'}).success().showIfHash('edit');
    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Zones.init();
});
