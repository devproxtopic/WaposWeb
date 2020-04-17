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
  <title>Wapos</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/9a331721e8.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css')}}">
  <script src="https://kit.fontawesome.com/9a331721e8.js" crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


  <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="{{ url('/admin') }}"><img src="{{ URL::asset('')}}" alt="Logo"></a>
        <a class="navbar-brand hidden" href="{{ url('') }}"><img src="{{ URL::asset('')}}" alt="Logo"></a>
      </div>

      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <h3 class="menu-title">Mi perfil</h3><!-- /.menu-title -->
          <li class="active">
            <a href="{{ url('') }}"> <i class="menu-icon fa fa-user"></i>Datos de usuario</a>
            <a href="{{ url('') }}"> <i class="menu-icon fa fa-credit-card"></i>Cuentas bancarias</a>
            <a href="{{ url('') }}"> <i class="menu-icon fa fa-file"></i>Documentos</a>
          </li>
          <h3 class="menu-title">Negocios</h3><!-- /.menu-title -->
          <li class="active">
            <a href="{{ url('/dashboard/businesses') }}"> <i class="menu-icon fa fa-arrow-up"></i>Nombre negocio</a>
          </li>

          <h3 class="menu-title">Pos</h3><!-- /.menu-title -->
          <li class="active">
            <a href="{{ url('dashboard/products')}}"> <i class="menu-icon fa fa-money"></i>Productos/Servicios</a>
          </li>
          <h3 class="menu-title">Edo. Cta</h3><!-- /.menu-title -->
          <li class="active">
            <a href="{{ url('') }}"> <i class="menu-icon fa fa-arrow-up"></i>Exitosas</a>
            <a href="{{ url('') }}"> <i class="menu-icon fa  fa-arrow-down"></i>Inválidas</a>
          </li>
          <h3 class="menu-title">Mis clientes</h3><!-- /.menu-title -->
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-users"></i>Clientes</a>
            <ul class="sub-menu children dropdown-menu">
              <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('')}}">Alguna otra opcion</a></li>
              <li><i class="fa fa-id-badge"></i><a href="{{ url('/') }}">Alguna otra opcion</a></li>
              <li><i class="fa fa-bars"></i><a href="{{ url('/') }}">Alguna otra opcion</a></li>
              <li><i class="fa fa-share-square-o"></i><a href="{{ url('/') }}">Alguna otra opcion</a></li>

            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
  </aside><!-- /#left-panel -->

  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">

    <div class="content mt-3">

      @yield('content')

    </div> <!-- .content -->
  </div><!-- /#right-panel -->

  <!-- Right Panel -->

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
    (function($) {
      "use strict";

      jQuery('#vmap').vectorMap({
        map: 'world_en',
        backgroundColor: null,
        color: '#ffffff',
        hoverOpacity: 0.7,
        selectedColor: '#1de9b6',
        enableZoom: true,
        showTooltip: true,
        values: sample_data,
        scaleColors: ['#1de9b6', '#03a9f5'],
        normalizeFunction: 'polynomial'
      });
    })(jQuery);
  </script>

</body>

</html>