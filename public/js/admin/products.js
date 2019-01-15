var Products = (function (w, $, undefined) {

    function init () {
        dtInit();
        listeners();
        boxes();
        $('#left-panel li[data-nav="products"]').addClass('active');
    }

    var homeStates = {
        0:{label:'default', value:'No'},
        1:{label:'success', value:'Si'}
    }

    //Data Table
    function dtInit() {
        window.DT.create('#datatable', {
            resource: 'products',
            columns: [
                'thumb|image',
                'name|limit',
                'code',
                'cost|callback:(function(row){if (row.price) return row.price; else return Math.ceil(row.cost * row.profit_margin / 100 + row.cost); })(row)',
                'home|stateSwitcher:'+JSON.stringify(homeStates),
                'is_visible|stateSwitcher',
                'category|limit',
                'subcategory|limit',
                'id|actions'
            ]
        });
    }
    //fin Data Table

    //listeners
    function listeners () {
        $('.saveForm').on('click', function () {
            $('#form').submit();
        });
        $('#tipo-precio').on('change', function() {
            togglePrecio();
        });
        if ($('input[name="profit_margin"]').val()) {
            $('#tipo-precio').val(1);
        } else {
            $('#tipo-precio').val(2);
        }
        $('input[data-type="float"]').on('keypress', function (e) {
            if (e.which == 44) {
                $(this).val($(this).val() + '.');
            }
            if (e.which != 46 && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
        togglePrecio();
    }

    //toggle precio
    function togglePrecio() {
        if ($('#tipo-precio').val() == 1) {
            $('input[name="profit_margin"]').attr('disabled', false);
            $('input[name="price"]').attr('disabled', true);
            $('input[name="price"]').val('');
        } else {
            $('input[name="price"]').attr('disabled', false);
            $('input[name="profit_margin"]').attr('disabled', true);
            $('input[name="profit_margin"]').val('');
        }
    }

    function boxes () {
        Box.small({title:'Perfecto', content:'El producto se cargó con éxito.'}).success().showIfHash('new');
        Box.small({title:'Perfecto', content:'El producto se editó con éxito.'}).success().showIfHash('edit');
        Box.small({title:'Perfecto', content:'El stock se actualizó con éxito.'}).success().showIfHash('stock');
    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Products.init();
});