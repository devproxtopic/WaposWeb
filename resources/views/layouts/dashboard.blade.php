<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" href="{{ URL::asset('')}}" />
  <title>WAPOS</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/9a331721e8.js" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css')}}">
  <script src="https://kit.fontawesome.com/9a331721e8.js" crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>

<body>


  <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ URL::asset('images/WAPOS-logo.png')}}" alt="Logo"></a>
        <a class="navbar-brand hidden" href="{{ url('/') }}"><img src="{{ URL::asset('images/WAPOS-logo.png')}}" alt="Logo"></a>
      </div>

      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <h3 class="menu-title">Mis transacciones</h3><!-- /.menu-title -->
          <li class="active">
            <a href="{{ url('/dashboard/pos') }}"> <img class="menu-icon" src="{{ URL::asset('images/pos.png')}}" alt="Logo">POS</a>
            <a href="{{ url('/dashboard/transactions') }}"> <img class="menu-icon" src="{{ URL::asset('images/transaction.png')}}" alt="Logo">Transacciones</a>
            <a href="{{ url('/dashboard/simulator') }}"> <img class="menu-icon" src="{{ URL::asset('images/transaction.png')}}" alt="Logo">Simulador de pago</a>

          </li>

          <h3 class="menu-title">Mi Negocio</h3><!-- /.menu-title -->
          <li class="active">
            <!--<a href="{{ url('/dashboard/myBusiness')}}"> <i class="menu-icon fa fa-arrow-up"></i>Ver</a>
                    <a href="{{ url('/dashboard/transactions/failed') }}"> <i class="menu-icon fa  fa-arrow-down"></i>Inválidas</a>-->
            <a href="{{ url('/dashboard/clients')}}"> <img class="menu-icon" src="{{ URL::asset('images/customer.png')}}" alt="Logo">Clientes</a>
            <a href="{{ url('dashboard/products')}}"> <img class="menu-icon" src="{{ URL::asset('images/shop.png')}}" alt="Logo">Productos/Servicios</a>
            <a href="{{ url('/dashboard/banks') }}"> <img class="menu-icon" src="{{ URL::asset('images/bill.png')}}" alt="Logo">Estado de cuenta</a>
            <a href="{{ url('/dashboard/transactions/success') }}"> <img class="menu-icon" src="{{ URL::asset('images/cloud.png')}}" alt="Logo">Depósitos</a>
          </li>

          <h3 class="menu-title">Mi usuario</h3><!-- /.menu-title -->
          <li class="active">
            <a href="{{ url('/dashboard/settings') }}"> <img class="menu-icon" src="{{ URL::asset('images/account.png')}}" alt="Logo">Configuración</a>
            <a href="{{ url('/dashboard/files') }}"> <img class="menu-icon" src="{{ URL::asset('images/paper.png')}}" alt="Logo">Documentos</a>
            <a href="{{ url('/dashboard/BankInformation') }}"> <img class="menu-icon" src="{{ URL::asset('images/economy.png')}}" alt="Logo">Datos bancarios</a>
            <a href="{{ url('/dashboard/Security') }}"> <img class="menu-icon" src="{{ URL::asset('images/password.png')}}" alt="Logo">Seguridad</a>

          </li>


          <h3 class="menu-title">Marketing</h3><!-- /.menu-title -->
          <li class="active">
          </li>

          <a class="menu-title" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
  </aside><!-- /#left-panel -->

  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">

    <div class="content mt-3">
      <input type="hidden" name="url_base" id="url_base" value="{{ url('') }}">
      @yield('content')

    </div> <!-- .content -->
  </div><!-- /#right-panel -->

  <!-- Right Panel -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


  <script type="text/javascript">
   

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

      var table = $('#datatable').DataTable();
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);
        $userFields = JSON.parse(data[6]);
        $productFields = JSON.parse(data[7]);

        $('#product_id').val(data[3]);
        $('#ordernumber').text(data[1]);
        $('#name').val($userFields["name"]);
        $('#phone').val($userFields["phone"]);
        $('#product_name').val($productFields["title"]);
        $('#currency').val($productFields["currency"]);
        $('#description').val($productFields["description"]);
        $('#price').val('$' + $productFields["price"]);
        $('#editModal').modal('show');
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
        $('#amount_db').val( data[3]);
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

      var customer_name = "";
      var business_name = "";
      var price = "";
      $('.client-select-pos').change(function() {
        console.log("entro");
        var baseUrl = $('#url_base').val();
        console.log($('.client-select-pos').val())
        $valId = $('.client-select-pos').val();
        if ($valId != 0 && $valId != -1) {
          $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: baseUrl + '/buyers/' + $valId,
            success: function(data) {
              console.log('success');
              $buyer = data[0];
              customer_name = $buyer["name"] +" "+ $buyer["lastname"];
              $('#name').val($buyer["name"]);
              $('#lastname').val($buyer["lastname"]);
              $('#lada').val($buyer["ladanumber"]);
              $('#phone').val($buyer["phone"]);
              
              messagePOS(customer_name, price, business_name);
        
            },
            error: function() {
              console.log('no success');
              console.log(data);
            }
          });

        } else {
          $('#general_users').find('input:text').val('');
        }
      });


      
      $('.product-select-pos').change(function() {
        var baseUrl = $('#url_base').val();
        console.log($('.product-select-pos').val())
        $valId = $('.product-select-pos').val();
        if ($valId != 0 && $valId != -1) {
          $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: baseUrl + '/products/' + $valId,
            success: function(data) {
              console.log('success');
              $product = data[0];
              $('#title').val($product["title"]);
              $('#currency').val($product["currency"]);
              $('#price').val($product["price"]);
              price = $product["price"];

              messagePOS(customer_name, price, business_name);
            },
            error: function() {
              console.log('no success');
              console.log(data);
            }
          });
        } else {
          $('#general_users').find('input:text').val('');
        }

      });

    });
  </script>
  <script>


    


    

    function messagePOS(name, price, business_name) {
      $('#message').val("Hola "+ name +" soy Paula, tu asistente de pago de wapido. Hemos generado el siguiente enlace para que realices tu pago a través de billpocket de forma segura, por el importe de $" +$product["price"]+".00");

      //$('#message').val("Hola "+ name +" soy Paula, tu asistente de pago de WAPOS. Hemos generado el siguiente enlace para que realices tu pago a "+ business_name +" de forma segura, por el importe de $" +$product["price"]+".00");
    }



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
  </script>
</body>

</html>