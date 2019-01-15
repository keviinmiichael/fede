var Stocks = (function (w, $, undefined) {

    function init () {
        dtInit();
        listeners();
        boxes();
        $('#left-panel li[data-nav="stock"]').addClass('active');
    }

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'products',
            columns: [
                'name|limit:80',
                'stock|callback:(function(row){return \'<span class="stock"  data-id="\'+row.id+\'">\'+row.stock+\'</span>\'}(row))',
                'id|callback:(function (row){return \'<a class="btn btn-primary" href="mas" data-id="\'+row.id+\'"><i class="fa fa-plus"></i></a> <a class="btn btn-primary" href="menos" data-id="\'+row.id+\'"><i class="fa fa-minus"></i></a>\'})(row)'
            ]
        });
    }
    //fin Data Table

    function listeners () {
        var id, $span;
        $('#datatable').on('click', '.btn', function (e) {
            e.preventDefault();
            id = $(this).data('id');
            $span = $('.stock[data-id="'+id+'"]');
            if ($(this).attr('href') == 'mas') {
                $span.html($span.html()*1+1);
            } else {
                $span.html($span.html()*1-1);
            }
            $.ajax({
                url: '/admin/stock/'+id,
                type: 'put',
                data: {
                    stock: $span.html()*1
                }
            });
        });
    }

    function boxes () {
        Box.small({title: 'Perfecto', content:'El stock se cargó con éxito.'}).success().showIfHash('new');
        Box.small({title: 'Perfecto', content:'El stock se editó con éxito.'}).success().showIfHash('edit');
    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Stocks.init();
});
