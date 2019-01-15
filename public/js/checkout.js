var Checkout = (function (w, $, undefined) {
	
	function init () {
	    listeners();
	}

	//-------------------
	//-----listeners-----
	//-------------------
	function listeners () {
	    $('a[href="pagar"]').on('click', function (e) {
	        e.preventDefault();
	        $('span', this).text('PAGAR...');
	        pay();
	    });
	}

	function pay() {
	    $.ajax({
	        url: '/comprar',
	        type: 'post',
	        success: function (response) {
	            window.location = response.url;
	        },
	        error: function (response) {
	            $('a[href="pagar"]').find('.fa-spin').hide();
	            $.notify({message: 'Ocurrió un error, por favor intente nuevamente.' },{type: 'danger'});
	        }
	    });
	}

	return {
	    init : function () {
	        init();
	    }
	}

})(window, jQuery, undefined);

$(document).ready(function () {
	Checkout.init();
});