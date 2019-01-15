var Coupon = (function (w, $, undefined) {
    function init () {
        $('#left-panel li[data-nav="coupons"]').addClass('active');
        $('.saveForm').on('click', function () {
            $('#form').submit();
        });
    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Coupon.init();
});