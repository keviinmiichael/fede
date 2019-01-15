var Category = (function (w, $, undefined) {

    function init () {
		$('.saveForm').on('click', function () {
		  $('#form').submit();
		});
        $('#left-panel li[data-nav="categories"]').addClass('active');
    }

    return {
        init : function () {
            init();
        }
    }
})(window, jQuery, undefined);

$(document).ready(function () {
    Category.init();
});