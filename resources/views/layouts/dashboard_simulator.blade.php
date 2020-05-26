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


  


     


      


      
     
      var stripe = Stripe('pk_test_bOwsCmDWzdS8k2SYwvX3WoIn00tK9Z5yXo');
    var elements = stripe.elements();
      var card = elements.create('card', {
        style: {
          base: {
            iconColor: '#2f38c2',
            color: '#31325F',
            lineHeight: '50px',
            fontWeight: 300,
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSize: '15px',

            '::placeholder': {
              color: '#9ba1a8',
            },
          },
        }
      });
      // Add an instance of the card Element into the `card-element` <div>.
      card.mount('#card-element');
      var form = document.getElementById('payment-form');
      form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
          if (result.error) {
            // Inform the customer that there was an error.
            console.log("al parecer errores con el token")
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
          } else {
            // Send the token to your server.
            var baseUrl = $('#url_base').val();

            var order_number = document.getElementById('orderno').value;
            var phone_number = document.getElementById('phone').value;
            var name_customer = document.getElementById('name').value;
            var amount_purchase = document.getElementById('amount_db').value;
            $.ajax({
            type: 'POST',
            url: baseUrl + '/dashboard/transactions/create',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { stripeToken: result.token["id"], amount: amount_purchase, phone: phone_number, name: name_customer, description: "This is the payment for the order "+order_number, orderno:order_number  } ,
            success: function(data) {
              console.log('success');
              $('#PagarModal').modal('hide');
              alert("Pago realizado exitosamente");
              console.log(data);
            },
            error: function(data) {
              alert(data.responseJSON.message);
              $('#PagarModal').modal('hide');
              console.log(data);
            }
          });
          }
        });
      });
    });
  </script>
  <script>
    function checkNumberCard(e) {
      tecla = (document.all) ? e.keyCode : e.which;

      //Tecla de retroceso para borrar, siempre la permite
      if (tecla == 8) {
        return true;
      }

      var value = document.getElementById('card-number').value;
      if (value.length > 15) {
        return false; // keep form from submitting
      }
      // Patron de entrada, en este caso solo acepta numeros y letras
      patron = /[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }

    function checkCVC(e) {
      tecla = (document.all) ? e.keyCode : e.which;

      //Tecla de retroceso para borrar, siempre la permite
      if (tecla == 8) {
        return true;
      }

      var value = document.getElementById('cvc').value;
      if (value.length > 2) {
        return false; // keep form from submitting
      }
      // Patron de entrada, en este caso solo acepta numeros y letras
      patron = /[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }


    function checkMonth(e) {
      tecla = (document.all) ? e.keyCode : e.which;

      //Tecla de retroceso para borrar, siempre la permite
      if (tecla == 8) {
        return true;
      }

      var value = document.getElementById('month').value;
      if (value.length > 1) {
        return false; // keep form from submitting
      }
      // Patron de entrada, en este caso solo acepta numeros y letras
      patron = /[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }

    function checkYear(e) {
      tecla = (document.all) ? e.keyCode : e.which;

      //Tecla de retroceso para borrar, siempre la permite
      if (tecla == 8) {
        return true;
      }

      var value = document.getElementById('year').value;
      if (value.length > 1) {
        return false; // keep form from submitting

      }

      // Patron de entrada, en este caso solo acepta numeros y letras
      patron = /[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
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