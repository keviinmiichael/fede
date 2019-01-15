var Prices = (function (w, $, undefined) {

    var itemTpl = $('#itemTpl').val(), enterPress = false;

    function init () {
        $('#left-panel li[data-nav="prices"]').addClass('active');
        $('.addItem').click(addItem);
        save();
        addRow();
        autocomplete($('#prices tbody tr:last'));
        tabIndex();
        restrictTypes();
        $('#prices').on('change', 'select[name="price_format[]"]', function() {
            togglePrice(this);
        });
        updatePrice();
    }

    function updatePrice () {
        $('#prices').on('input', 'input[name="profit_margin[]"]', function () {
            var $tr = $(this).parents('tr');
            var cost = $('input[name="cost[]"]', $tr).val()*1;
            var price = Math.ceil((cost * ($(this).val() * 1) / 100) + cost);
            $('input[name="price[]"]', $tr).val(price);
        });
    }

    function save () {
        $('#guardar').on('click', function () {
            $('#formPrice').submit();
        });
    }

    function addItem () {
        var html = itemTpl;
        $('#prices tbody').append(html)
        $('#prices tbody tr:last input:first').focus();
        autocomplete($('#prices tbody tr:last'));
    }

    function addRow () {
        $('#prices tbody').on('keydown', 'input', function (e) {
            if (e.keyCode==13 || (e.keyCode==9 && $(this).attr('name') == 'price[]')) {
                e.preventDefault();
                addItem();
            }
            if(e.keyCode == 46) removeRow($(this));
        });
    }

    function removeRow (self) {
        if ($('#prices tbody tr').length > 1) {
            $(self).parents('tr').remove();
        }
    }

    function tabIndex () {
        $('.jarviswidget-fullscreen-btn').attr('tabindex', '-1');
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

    function autocomplete ($tr) {
        $tr.find('input[name="name[]"]').autocomplete({
            source:namesAutocomplete,
            response: function (event, ui) {
                if (ui.content.length) {
                    $(event.target).parents('tr').find('input[name="code[]"]').val(ui.content[0].code);
                    $(this).data({currentItem:ui.content[0]})
                }
            },
            focus: function (event, ui) {
                event.target.value = ui.item.label;
                $(event.target).parents('tr').find('input[name="code[]"]').val(ui.item.code);
                return false;
            },
            select: function (event, ui) {
                var $tr = $(event.target).parents('tr');
                event.target.value = ui.item.label;
                $tr.find('input[name="code[]"]').val(ui.item.code);
                $tr.find('input[name="product_id[]"]').val(ui.item.id);
                $tr.find('input[name="price[]"]').val(ui.item.price);
                price($tr, ui.item);
                return false;
            },
            change: function (event, ui) {
                if (ui.item == null) {
                    var $tr = $(event.target).parents('tr'), item = $(this).data('currentItem');
                    event.target.value = item.label;
                    $tr.find('input[name="name[]"]').val(item.name)
                    $tr.find('input[name="code[]"]').val(item.code);
                    $tr.find('input[name="product_id[]"]').val(item.id);
                    $tr.find('input[name="price[]"]').val(item.price);
                    price($tr, item);
                }
            },
            _renderItem: function( ul, item ) {
                return $( "<li>" )
                .append( "<a>" + item.label+"</a>" )
                .appendTo( ul );
            }
        });
        
        $tr.find('input[name="code[]"]').autocomplete({
            source:codesAutocomplete,
            response: function (event, ui) {
                if (ui.content.length) {
                    $(event.target).parents('tr').find('input[name="name[]"]').val(ui.content[0].name);
                    $(event.target).parents('tr').find('input[name="price[]"]').val(ui.content[0].price);
                    $(this).data({currentItem:ui.content[0]})
                }
            },
            focus: function (event, ui) {
                event.target.value = ui.item.label;
                $(event.target).parents('tr').find('input[name="name[]"]').val(ui.item.name);
                $(event.target).parents('tr').find('input[name="price[]"]').val(ui.item.price);
                return false;
            },
            select: function (event, ui) {
                var $tr = $(event.target).parents('tr');
                event.target.value = ui.item.label;
                $tr.find('input[name="name[]"]').val(ui.item.name)
                $tr.find('input[name="code[]"]').val(ui.item.code);
                $tr.find('input[name="product_id[]"]').val(ui.item.id);
                $tr.find('input[name="price[]"]').val(ui.item.price);
                return false;
            },
            change: function (event, ui) {
                if (ui.item == null) {
                    var $tr = $(event.target).parents('tr'), item = $(this).data('currentItem');
                    event.target.value = item.label;
                    $tr.find('input[name="name[]"]').val(item.name)
                    $tr.find('input[name="code[]"]').val(item.code);
                    $tr.find('input[name="product_id[]"]').val(item.id);
                    $tr.find('input[name="price[]"]').val(item.price);
                    price ($tr, item)
                }
            },
            _renderItem: function( ul, item ) {
                return $( "<li>" )
                .append( "<a>" + item.label+"</a>" )
                .appendTo( ul );
            }
        });
    }

    //price
    function togglePrice(self) {
        var $row = $(self).parents('tr'), realvalue;
        if ($(self).val() == 1) {
            realvalue = $row.find('input[name="profit_margin[]"]').data('realvalue');
            $row.find('input[name="profit_margin[]"]').attr('readonly', false).val(realvalue);
            $row.find('input[name="price[]"]').attr('readonly', true);
            //$row.find('input[name="price[]"]').val('');
        } else {
            realvalue = $row.find('input[name="price[]"]').data('realvalue');
            $row.find('input[name="price[]"]').attr('readonly', false).val(realvalue);
            $row.find('input[name="profit_margin[]"]').attr('readonly', true);
            $row.find('input[name="profit_margin[]"]').val('');
        }
    }

    function price ($tr, item) {
        var $select = $tr.find('select'),
            val = (!item.profit_margin)?2:1;
        $select.val(val);
        togglePrice($select);
        $tr.find('input[name="price[]"]').val(item.price).data('realvalue', item.price);
        $tr.find('input[name="profit_margin[]"]').val(item.profit_margin).data('realvalue', item.profit_margin);
        /*
        if (!item.profit_margin) {
            $tr.find('input[name="price[]"]').val(item.price).data('realvalue', item.price);
            $tr.find('input[name="profit_margin[]"]').val(item.profit_margin).data('realvalue', item.profit_margin);
        } else {
            $tr.find('input[name="profit_margin[]"]').val(item.profit_margin).data('realvalue', item.profit_margin);
            $tr.find('input[name="price[]"]').data('realvalue', '');
        }
        */
    }
    //-----

    return {
        init : function () {
            init();
        },
        removeRow: function (self) {
            removeRow(self);
        }
    }

})(window, jQuery);

$(document).ready(function () {
    Prices.init();
});