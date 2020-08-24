$(document).ready(function() {
    let i = 0;

    $('.add').click(function() {
        if ($('#quantity').val() > 0) {
            $('#product_list > tbody:last-child').append('<tr>' +
                '<td>' + (i + 1) + '</td>' +
                '<td>' + $('option:selected', '#product_id').attr('sku') +
                '<input type=hidden value=' + $('option:selected', '#product_id').val() + ' name="product_id[]">' +
                '</td>' +
                '<td>' + $('option:selected', '#product_id').attr('title') + '</td>' +
                '<td><input readonly class="form-control" type="number" value=' + $('#quantity').val() + ' name="quantity[' + $('option:selected', '#product_id').val() + ']">' +
                '</td>' +
                '<td><input readonly class="form-control" type="number" value=' + $('option:selected', '#product_id').attr('price') + ' name="price[' + $('option:selected', '#product_id').val() + ']">' +
                '</td>' +
                '<td><input readonly class="form-control subtotal" type="number" value=' + $('option:selected', '#product_id').attr('price') * $('#quantity').val() + ' name="subtotal[' + $('option:selected', '#product_id').val() + ']">' +
                '</td>' +
                '<td><button title="Borrar" class="btn btn-sm btn-danger pull-right view delete_product">x</button></td>' +
                '</tr>');

            var subtotal = 0;

            $(".subtotal").each(function(i, k) {
                subtotal += parseInt($(k).val()) || 0;
            });

            $('#product_list_total').text(subtotal);
            $('#amount').val(subtotal);

            $('#quantity').val('');
            $('#price').val('');
            $('#iva').val('');

        } else {
            toastr.error('Debe colocar una cantidad válida.');
        }

    });

    //Eliminar fila.
    $('#product_list').on('click', '.delete_product', function() {
        $(this).parents('tr').eq(0).remove();

        var subtotal = 0;

        $(".subtotal").each(function(i, k) {
            subtotal += parseInt($(k).val()) || 0;
        });

        $('#product_list_total').text(subtotal);
        $('#amount').val(subtotal);
    });
});