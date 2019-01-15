var Coupons = (function (w, $, undefined) {

    function init () {
        dtInit();
        boxes();
        $('#left-panel li[data-nav="coupons"]').addClass('active');
    }

    var useStates = {
        0:{label:'warning', value:'No utilizado'},
        1:{label:'success', value:'Utilizado'},
    }

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'coupons',
            columns: [
                'created_at|moment:DD-MM-YYYY',
                'code',
                'discount|callback:(function(row){ return (row.type_id == 1 ? "" : "$"  ) + row.discount + (row.type_id == 1 ? "%" : ""  ) })(row)',
                //'applied|label:'+JSON.stringify(useStates),
                'id|actions'
            ],
            order: [[ 0, "desc" ]],
        });
    }
    //fin Data Table

    function boxes () {
        Box.small({title: 'Perfecto', content:'El copón se creó con éxito.'}).success().showIfHash('create');
        Box.small({title: 'Perfecto', content:'El copón se editó con éxito.'}).success().showIfHash('edit');
    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Coupons.init();
});
