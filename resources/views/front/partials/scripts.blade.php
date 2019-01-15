<script src="/js/vendor.min.js"></script>
<script src="/js/scripts.min.js"></script>
<script src="/js/bootstrap-notify.min.js"></script>
<script src="/js/jquery.ui.shake.min.js"></script>
<script src="/js/addToCart.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script>
    //NO REMOVER
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $('#form-newsletter').on('submit', function (e) {
        e.preventDefault();
        var $form = $(this);
        // $form.find('i').attr('class', 'fa fa-span fa-spinner');
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: $form.serialize(),
            success: function () {
                // $form.find('i').attr('class', 'fa fa-arrow-circle-o-right');
                $form.find('input').val('')
                // $.notify({message: 'Muchas gracias por suscribirse' },{type: 'success'});
            },
            error: function (response) {
                // $form.find('i').attr('class', 'fa fa-arrow-circle-o-right');
                $.notify({message: response.responseJSON.errors['email'][0]},{type: 'danger'});
            }
        })
    });



</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109425651-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109425651-1');
</script> --}}
