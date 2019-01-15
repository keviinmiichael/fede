var Stock = (function (w, $, undefined) {

    var itemTpl = $('#itemTpl').val(), enterPress = false;

    function init () {
        $('#left-panel li[data-nav="stock"]').addClass('active');
        $('.addItem').click(addItem);
        save();
        addRow();
        autocomplete($('#stock tbody tr:last'));
        tabIndex();
        restrictTypes();
        $('select.selectpicker').selectpicker();
    }


    function save () {
        $('#guardar').on('click', function () {
            $('#formStock').submit();
        });
    }

    function addItem () {
        var html = itemTpl;
        $('#stock tbody').append(html)
        $('#stock tbody tr:last input:first').focus();
        autocomplete($('#stock tbody tr:last'));
        $('select.selectpicker:last').selectpicker();
    }

    function addRow () {
        $('#stock tbody').on('keydown', 'input', function (e) {
            if (e.keyCode==13 || (e.keyCode==9 && $(this).attr('name') == 'amount[]')) {
                e.preventDefault();
                addItem();
            }
            if(e.keyCode == 46) removeRow($(this));
        });
    }

    function removeRow (self) {
        if ($('#stock tbody tr').length > 1) {
            $(self).parents('tr').remove();
        }
    }

    function restrictTypes () {
        $('#stock').on('keypress', 'input[data-type="float"]',function (e) {
            if (e.which == 44) $(this).val($(this).val() + '.');
            if (e.which != 46 && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) return false;
        });
        $('#stock').on('keypress', 'input[data-type="int"]',function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) return false;
        });
    }

    function tabIndex () {
        $('.jarviswidget-fullscreen-btn').attr('tabindex', '-1');
    }

    //Autocompletes (esto necesita un refactor urgente)
    function autocomplete ($tr) {
        $tr.find('input[name="name[]"]').autocomplete({
            source:namesAutocomplete,
            response: function (event, ui) {
                if (ui.content.length) {
                    $(event.target).parents('tr').find('input[name="code[]"]').val(ui.content[0].code);
                    $(event.target).parents('tr').find('input[name="cost[]"]').val(ui.content[0].cost);
                    $(this).data({currentItem:ui.content[0]})
                }
            },
            focus: function (event, ui) {
                event.target.value = ui.item.label;
                $(event.target).parents('tr').find('input[name="code[]"]').val(ui.item.code);
                $(event.target).parents('tr').find('input[name="cost[]"]').val(ui.item.cost);
                return false;
            },
            select: function (event, ui) {
                var $tr = $(event.target).parents('tr');
                event.target.value = ui.item.label;
                $tr.find('input[name="code[]"]').val(ui.item.code);
                $tr.find('input[name="product_id[]"]').val(ui.item.id);
                $tr.find('input[name="cost[]"]').val(ui.item.cost);
                return false;
            },
            change: function (event, ui) {
                if (ui.item == null) {
                    var $tr = $(event.target).parents('tr'), item = $(this).data('currentItem');
                    event.target.value = item.label;
                    $tr.find('input[name="name[]"]').val(item.name)
                    $tr.find('input[name="code[]"]').val(item.code);
                    $tr.find('input[name="product_id[]"]').val(item.id);
                    $tr.find('input[name="cost[]"]').val(item.cost);
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
                    $(event.target).parents('tr').find('input[name="cost[]"]').val(ui.content[0].cost);
                    $(this).data({currentItem:ui.content[0]})
                }
            },
            focus: function (event, ui) {
                event.target.value = ui.item.label;
                $(event.target).parents('tr').find('input[name="name[]"]').val(ui.item.name);
                $(event.target).parents('tr').find('input[name="cost[]"]').val(ui.item.cost);
                return false;
            },
            select: function (event, ui) {
                var $tr = $(event.target).parents('tr');
                event.target.value = ui.item.label;
                $tr.find('input[name="name[]"]').val(ui.item.name)
                $tr.find('input[name="code[]"]').val(ui.item.code);
                $tr.find('input[name="product_id[]"]').val(ui.item.id);
                $tr.find('input[name="cost[]"]').val(ui.item.cost);
                return false;
            },
            change: function (event, ui) {
                if (ui.item == null) {
                    var $tr = $(event.target).parents('tr'), item = $(this).data('currentItem');
                    if (item) {
                        event.target.value = item.label;
                        $tr.find('input[name="name[]"]').val(item.name)
                        $tr.find('input[name="code[]"]').val(item.code);
                        $tr.find('input[name="product_id[]"]').val(item.id);
                        $tr.find('input[name="cost[]"]').val(item.cost);
                    }
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
    Stock.init();
});