var Slider = (function (w, $, undefined) {

    function init () {
        boxes();
        $('#left-panel li[data-nav="sliders"]').addClass('active');
        $('.saveForm').on('click', function () {
            $('#form').submit();
        });
    }

    function boxes () {
        Box.small({title: 'Perfecto', content:'El slider se editó con éxito.'}).success().showIfHash('edit');
    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Slider.init();
});