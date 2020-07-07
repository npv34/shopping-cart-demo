$(document).ready(function () {
    $('.update-product-cart').change(function () {
        let qtyNew = $(this).val();
        let idProduct = $(this).attr('data-id');
        let origin = location.origin;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : origin + '/update-to-cart/' + idProduct,
            method: 'POST',
            data: {
                qty: qtyNew
            },
            dataType: 'json',
            success: function (result) {
                let data = result.productUpdate;
                $('#product-subtotal-' + idProduct).html('$' + data.price)
                $('#total-price-cart').html('Tổng tiền: $' + result.totalPriceCart)
            }
        })

    })
})
