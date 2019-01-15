var Subzone = (function (w, $, undefined) {

    function init () {
        dtInit();
        boxes();
        $('#left-panel li[data-nav="zones"]').addClass('active');
    }

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'subzones',
            columns: [
                'name|limit',
                'price',
                'id|actions'
            ],
            data: {
                zone_id: $('#zone_id').val()
            }
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
    Subzone.init();
});
