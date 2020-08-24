<nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
        aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
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
            <a href="{{ url('/dashboard/pos-express') }}"> <img class="menu-icon" src="{{ URL::asset('images/pos.png')}}" alt="Logo">POS Express</a>
            <a href="{{ url('/dashboard/transactions') }}"> <img class="menu-icon" src="{{ URL::asset('images/transaction.png')}}" alt="Logo">Transacciones</a>
            <a href="{{ url('/dashboard/simulator') }}"> <img class="menu-icon" src="{{ URL::asset('images/transaction.png')}}" alt="Logo">Simulador de pago</a>

        </li>

        <h3 class="menu-title">Mi Negocio</h3><!-- /.menu-title -->
        <li class="active">
            <a href="{{ url('/dashboard/orders')}}"> <img class="menu-icon" src="{{ URL::asset('images/bill.png')}}" alt="Logo">Ordenes</a>
            <a href="{{ url('/dashboard/stats-deposits')}}"> <img class="menu-icon" src="{{ URL::asset('images/bill.png')}}" alt="Logo">Estadísticas</a>
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
