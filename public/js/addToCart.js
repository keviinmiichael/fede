(function(){
    $(document).ready(function(){
        $('.addToCart').click(function(e) {
            e.preventDefault();
            var $this = $(this);

            $this.find('fa').show();
            $.ajax({
                url: '/cart/add/' + $this.data('id'),
                type: 'post',
                data: {qty: $('#qty').val()},
                success: function (response) {
                    $this.find('fa').hide();
                    $('#cart-total-items').text(response.totalItems);
                    $('.cart-total').text(response.total);
                    $('.carritoo').shake({distance: 10, speed: 90, times: 2});
                }
            });
        });
    });
})()
