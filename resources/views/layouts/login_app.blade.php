<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>WAPOS</title>
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="WAPOS"
    />
    <!-- /meta tags -->


    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://kit.fontawesome.com/9a331721e8.js" crossorigin="anonymous"></script>



    <!-- custom style sheet -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" >

    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->
</head>

<body>

    <h1></h1>
    <div class=" w3l-login-form">
        <a href="{{ url('/') }}"><span id="logo"><img src="{{ URL::asset('images/WAPOS.png')}}" alt="logo" class="video img-responsive animation-box wow animated bounceInDown" style="width: 400px;"></a>

        <main class="py-4">
            @yield('content')
        </main>

        </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2020 WAPOS. All Rights Reserved | BDG </p>
    </footer>

    <script>
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


        
