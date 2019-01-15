var Product = (function (w, $, undefined) {

    function init () {
        $('#left-panel li[data-nav="products"]').addClass('active');
        listeners();
        restrictTypes();
        updatePrice();
        togglePrice();
    }

    //listeners
    function listeners () {
        $('.saveForm').on('click', function () {
            $('#form').submit();
        });
        $('input[name="cost"]').on('input', function() {
            updatePrice();
        });
        $('select[name="price_format"]').on('change', function() {
            togglePrice();
        });
        $('input[name="profit_margin"]').on('input', function () {
            updatePrice();
        });
        $('select[name="category_id"]').on('change', function () {
            getSubcategoryByCategory();
        });
        if ($('input[name="price"]').val() == 0) $('input[name="price"]').val('');
    }

    function restrictTypes () {
        $('#prices').on('keypress', 'input[data-type="float"]',function (e) {
            if (e.which == 44) $(this).val($(this).val() + '.');
            if (e.which != 46 && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) return false;
        });
        $('#prices').on('keypress', 'input[data-type="int"]',function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) return false;
        });
    }

    function updatePrice () {
        if ($('select[name="price_format"]').val() == 1) {
            var cost = $('input[name="cost"]').val()*1;
            var price = Math.ceil((cost * ($('input[name="profit_margin"]').val() * 1) / 100) + cost);
            $('input[name="price"]').val(price);
        }
    }

    //price
    function togglePrice() {
        if ($('select[name="price_format"]').val() == 1) {
            realvalue = $('input[name="profit_margin"]').data('realvalue') || $('input[name="profit_margin"]').val();
            $('input[name="profit_margin"]').attr('readonly', false).val(realvalue);
            $('input[name="price"]').attr('readonly', true);
            updatePrice();
        } else {
            realvalue = $('input[name="price"]').data('realvalue') || $('input[name="price"]').val();
            $('input[name="price"]').attr('readonly', false).val(realvalue);
            $('input[name="profit_margin"]').attr('readonly', true).val('');
        }
    }
    //-----

    function getSubcategoryByCategory () {
        var id = $('select[name="category_id"]').val();
        if (id != 'null') {
            $('select[name="subcategory_id"]').attr('disabled', false);
            $.ajax({
                url: '/admin/subcategories/byCategory',
                type: 'get',
                data: {'category_id': id},
                success: function (response) {
                    $('select[name="subcategory_id"]').replaceWith(response)
                    if ($('select[name="subcategory_id"] option').length == 1) {
                        $('select[name="subcategory_id"]').attr('disabled', true);
                    }
                }
            });
        } else {
            $('select[name="subcategory_id"]').replaceWith('<select class="form-control" name="subcategory_id" id="subcategory" disabled="disabled"><option value="">Seleccionar</option></select>')
        }

    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Product.init();
});
