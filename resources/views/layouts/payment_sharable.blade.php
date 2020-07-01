<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>WAPOS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ URL::asset('images/WAPOS.png')}}" alt="Logo" style="max-width: 250px;"></a>

                </a>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                  
                </div>
            </div>
        </nav>

    

        <main class="py-4">
        <input type="hidden" name="url_base" id="url_base" value="{{ url('') }}">
            @yield('content')
        </main>
    </div>
    <script>
    $(document).ready(function() {

      var baseUrl = $('#url_base').val();
            console.log(baseUrl);


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
              color: '#000',
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
            console.log("al parecer errores con el token");
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
          } else {
            // Send the token to your server.
            var baseUrl = $('#url_base').val();
            console.log(baseUrl);
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
</body>
</html>
