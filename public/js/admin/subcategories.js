var Subcategories = (function (w, $, undefined) {

    function init () {
        dtInit();
        boxes();
        $('#left-panel li[data-nav="categories"]').addClass('active');
    }

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'subcategories',
            columns: [
                'value|limit',
                'id|actions'
            ],
            data: {
                category_id: $('#category_id').val()
            }
        });
    }
    //fin Data Table

    function boxes () {
        Box.small({title: 'Perfecto', content:'La subcategoría se cargó con éxito.'}).success().showIfHash('new');
        Box.small({title: 'Perfecto', content:'La subcategoría se editó con éxito.'}).success().showIfHash('edit');
    }
    
    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Subcategories.init();
});