var Purchase = (function (w, $, undefined) {

    var itemTpl = $('#itemTpl').val(), enterPress = false;

    function init () {
        $('#left-panel li[data-nav="purchases"]').addClass('active');
        listeners();
        save();
        addRow();
        autocomplete($('#products tbody tr:last'));
        tabIndex();
        restrictTypes();
    }

    function listeners () {
        $('select[name="client_type"]').on('change', function () {
            $('.type_client').hide();
            $('.type_client[data-type-client="'+$(this).val()+'"]').show();
        });
        $('.addItem').click(addItem);
        $('#products').on('input', '.amount', function () {
            var $tr = $(this).parents('tr');
            var price = $tr.find('.price').val();
            $tr.find('.total').val(price * $(this).val());
        });
    }

    function save () {
        $('#guardar').on('click', function () {
            $('#form').submit();
        });
    }

    function addItem () {
        var html = itemTpl;
        $('#products tbody').append(html)
        $('#products tbody tr:last input:first').focus();
        autocomplete($('#products tbody tr:last'));
    }

    function addRow () {
        $('#products tbody').on('keydown', 'input', function (e) {
            if (e.keyCode==13 || (e.keyCode==9 && $(this).attr('name') == 'amount[]')) {
                e.preventDefault();
                addItem();
            }
            if(e.keyCode == 46) removeRow($(this));
        });
    }

    function removeRow (self) {
        if ($('#products tbody tr').length > 1) {
            $(self).parents('tr').remove();
        }
    }

    function tabIndex () {
        $('.jarviswidget-fullscreen-btn').attr('tabindex', '-1');
    }

    function restrictTypes () {
        $('#products').on('keypress', 'input[data-type="float"]',function (e) {
            if (e.which == 44) $(this).val($(this).val() + '.');
            if (e.which != 46 && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) return false;
        });
        $('#products').on('keypress', 'input[data-type="int"]',function (e) {
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
                $tr.find('input[name="price[]"]').val(ui.item.discount_price);
                $tr.find('input[name="amount[]"]').val(1);
                $tr.find('input[name="total[]"]').val(ui.item.discount_price);
                return false;
            },
            change: function (event, ui) {
                if (ui.item == null) {
                    var $tr = $(event.target).parents('tr'), item = $(this).data('currentItem');
                    event.target.value = item.label;
                    $tr.find('input[name="name[]"]').val(item.name)
                    $tr.find('input[name="code[]"]').val(item.code);
                    $tr.find('input[name="product_id[]"]').val(item.id);
                    $tr.find('input[name="price[]"]').val(item.discount_price);
                    $tr.find('input[name="amount[]"]').val(1);
                    $tr.find('input[name="total[]"]').val(item.discount_price);
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
                    $(event.target).parents('tr').find('input[name="price[]"]').val(ui.content[0].discount_price);
                    $(event.target).parents('tr').find('input[name="amount[]"]').val(1);
                    $(event.target).parents('tr').find('input[name="total[]"]').val(ui.content[0].discount_price);
                    $(this).data({currentItem:ui.content[0]})
                }
            },
            focus: function (event, ui) {
                event.target.value = ui.item.label;
                $(event.target).parents('tr').find('input[name="name[]"]').val(ui.item.name);
                $(event.target).parents('tr').find('input[name="price[]"]').val(ui.item.discount_price);
                $(event.target).parents('tr').find('input[name="amount[]"]').val(1);
                $(event.target).parents('tr').find('input[name="total[]"]').val(ui.item.discount_price);
                return false;
            },
            select: function (event, ui) {
                var $tr = $(event.target).parents('tr');
                event.target.value = ui.item.label;
                $tr.find('input[name="name[]"]').val(ui.item.name)
                $tr.find('input[name="code[]"]').val(ui.item.code);
                $tr.find('input[name="product_id[]"]').val(ui.item.id);
                $tr.find('input[name="price[]"]').val(ui.item.discount_price);
                $tr.find('input[name="amount[]"]').val(1);
                $tr.find('input[name="total[]"]').val(ui.item.discount_price);
                return false;
            },
            change: function (event, ui) {
                if (ui.item == null) {
                    var $tr = $(event.target).parents('tr'), item = $(this).data('currentItem');
                    event.target.value = item.label;
                    $tr.find('input[name="name[]"]').val(item.name)
                    $tr.find('input[name="code[]"]').val(item.code);
                    $tr.find('input[name="product_id[]"]').val(item.id);
                    $tr.find('input[name="price[]"]').val(item.discount_price);
                    $tr.find('input[name="amount[]"]').val(1);
                    $tr.find('input[name="total[]"]').val(item.discount_price);
                }
            },
            _renderItem: function( ul, item ) {
                return $( "<li>" )
                .append( "<a>" + item.label+"</a>" )
                .appendTo( ul );
            }
        });
    }

    return {
        init : function () {
            init();
        },
        removeRow: function (self) {
            removeRow(self);
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Purchase.init();
});
