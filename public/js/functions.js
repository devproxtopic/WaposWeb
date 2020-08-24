$(document).ready(function() {

    $('.client-select').change(function() {
        if ($('.client-select').val() == '0') {
            $nombreUser = $('#name').val();
            $lastNameUser = $('#lastname').val();
            $ladaUser = $('#lada').val();
            $phoneUser = $('#phone').val();
        }
    });

    $('.country-select').change(function() {
        if ($('.country-select').val() == 'ugy') {
            $('#acta').text("Tarjeta de RUT");
            $('#cedula').text("Constancia BPS");
        }
        if ($('.country-select').val() == 'mxn') {
            $('#acta').text("Acta constitutiva");
            $('#cedula').text("Cedula Fiscal");
        }
    });


    var tableClients = $('#clients-table').DataTable();
    tableClients.on('click', '.transacciones', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = tableClients.row($tr).data();
        $('#transaction-client').modal('show');
    });

    var tableSimulator = $('#simulator-table').DataTable();
    tableSimulator.on('click', '.pagar', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = tableSimulator.row($tr).data();
        console.log(data);
        $('#name').val(data[2]);
        $('#orderno').val(data[1]);
        $('#ladanumber').val("+52"); //cambiar cuando si se lea la transaccion del data
        $('#phone').val("4443184173");
        $('#currency').val("MXN");
        $('#price').val(data[3]);
        $('#amount').val(data[3]);
        $('#amount').val(data[3]);
        $('#amount_db').val(data[3]);
        $('#PagarModal').modal('show');
    });

    var datatableProducts = $('#table-products-img').DataTable();
    datatableProducts.on('click', '.imagenDetail', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = datatableProducts.row($tr).data();
        console.log(data);
        $('#name-product').text(data[1]);
        $('#description-product').text(data[2]);
        $('#imageProduct').attr("src", data[5]);
        var baseUrl = $('#url_base').val();
        var completeBaseURL = baseUrl + "/products/product/" + data[0] + "/details/";

        $('#url_share_link').val(completeBaseURL);
        $('#detailImage').modal('show');
        //copy on clipboard
    });

    $('#shareURL').click(function() {
        $('#url_share_link').select();
        document.execCommand("copy");
    });

    // $('.product-select-pos').change(function() {
    //     var baseUrl = $('#url_base').val();
    //     console.log($('.product-select-pos').val())
    //     $valId = $('.product-select-pos').val();
    //     if ($valId != 0 && $valId != -1) {
    //         $.ajax({
    //             type: 'GET', //THIS NEEDS TO BE GET
    //             url: baseUrl + '/products/' + $valId,
    //             success: function(data) {
    //                 console.log('success');
    //                 $product = data[0];
    //                 $('#title').val($product["title"]);
    //                 $('#currency').val($product["currency"]);
    //                 $('#price').val($product["price"]);
    //                 price = $product["price"];

    //                 messagePOS(customer_name, price, business_name);
    //             },
    //             error: function() {
    //                 console.log('no success');
    //                 console.log(data);
    //             }
    //         });
    //     } else {
    //         $('#general_users').find('input:text').val('');
    //     }

    // });

});


// function messagePOS(name, price, business_name) {
//     $('#message').val("Hola " + name + " soy Paula, tu asistente de pago de wapido. " +
//         "Hemos generado el siguiente enlace para que realices tu pago a través de billpocket " +
//         "de forma segura, por el importe de $" + $product["price"] + ".00");

//     //$('#message').val("Hola "+ name +" soy Paula, tu asistente de pago de WAPOS. Hemos generado el siguiente enlace para que realices tu pago a "+ business_name +" de forma segura, por el importe de $" +$product["price"]+".00");
// }



function checkPhoneNumber(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    var value = document.getElementById('phone-number-client').value;
    if (value.length > 9) {
        return false; // keep form from submitting
    }
    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}