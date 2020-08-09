@extends($business == 1 ? 'layouts.dashboard' : 'layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">
                    @if ($business == 1)
                        ¡Bienvenido! </h3>
                    @else
                    Registrar negocio</h3>
                    Bienvenido, para comenzar a utilizar nuestro servicio, es necesario que registres tu negocio

                    @endif

                </div>

            </div>

            @if ($business == 0)
            <div class="card">
                <div class="card-header">

                Registrar un nuevo negocio</div>
                <div class="card-body">
                    <form id="" method="POST" action="{{ url('/dashboard/business/create') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Razon Social</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="razon_social" id="razon_social" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">RFC</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rfc_rut_cuit" id="rfc_rut_cuit" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Dirección</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" id="address" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Código Postal</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="postal_code" id="postal_code" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ladanumber" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-2">
                                <select name="ladanumber" id="ladanumber" class="form-control">
                                    <option value="00">Select</option>
                                    <option value="+52">México +52</option>
                                    <option value="+59">Uruguay +598</option>


                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="phone"    onkeypress="return checkPhoneNumber(event)"  id="phone-number-client" placeholder="Número*" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" id="email" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">PIN</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pin" id="pin" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Confirmar PIN</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('pin') is-invalid @enderror" name="pin_confirmation" id="pin_confirmation" required autofocus>
                            </div>
                            @error('pin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-right">
                                <button type="submit" class="btn btn-success save-general-user">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <center>
                                        <div class="col-auto">
                                            <img src="{{ asset('images/dashboard/8.png') }}" width="50%">
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transacciones confirmadas</div>
                                            <span>(Mes en curso)</span>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">2,737</div>
                                        </div>
                                    </center>
                                    <div class="mt-2 col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Mes anterior</div>
                                        <div class="h5 mb-0 font-weight-bold text-success">5,089</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Proyección</div>
                                        <div class="h5 mb-0 font-weight-bold text-primary">5,602</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <center>
                                        <div class="col-auto">
                                            <img src="{{ asset('images/dashboard/9.png') }}" width="50%">
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transacciones canceladas</div>
                                            <span>(Mes en curso)</span>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">322</div>
                                        </div>
                                    </center>
                                    <div class="mt-2 col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Mes anterior</div>
                                        <div class="h5 mb-0 font-weight-bold text-success">937</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Proyección</div>
                                        <div class="h5 mb-0 font-weight-bold text-primary">812</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <center>
                                        <div class="col-auto">
                                            <img src="{{ asset('images/dashboard/10.png') }}" width="50%">
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transacciones pendientes</div>
                                            <span>(Mes en curso)</span>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">22</div>
                                        </div>
                                    </center>
                                    <div class="mt-2 col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Mes anterior</div>
                                        <div class="h5 mb-0 font-weight-bold text-success">37</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Proyección</div>
                                        <div class="h5 mb-0 font-weight-bold text-danger">44</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <center>
                                        <div class="col-auto">
                                            <img src="{{ asset('images/dashboard/6.png') }}" width="50%">
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ticket promedio</div>
                                            <span>(Mes en curso)</span>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$332</div>
                                        </div>
                                    </center>
                                    <div class="mt-2 col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Mes anterior</div>
                                        <div class="h5 mb-0 font-weight-bold text-success">$677</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Proyección</div>
                                        <div class="h5 mb-0 font-weight-bold text-primary">$744</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <center>
                                        <div class="col-auto">
                                            <img src="{{ asset('images/dashboard/7.png') }}" width="50%">
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total cobrado en $</div>
                                            <span>(Mes en curso)</span>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$910,050</div>
                                        </div>
                                    </center>
                                    <div class="mt-2 col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Mes anterior</div>
                                        <div class="h5 mb-0 font-weight-bold text-success">$3,445,800</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Proyección</div>
                                        <div class="h5 mb-0 font-weight-bold text-primary">$4,205,000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <center>
                                        <div class="col-auto">
                                            <img src="{{ asset('images/dashboard/5.png') }}" width="50%">
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ingresos por Wapos</div>
                                            <span>(Mes en curso)</span>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$879,654</div>
                                        </div>
                                    </center>
                                    <div class="mt-2 col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Mes anterior</div>
                                        <div class="h5 mb-0 font-weight-bold text-success">$3,330,710</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Proyección</div>
                                        <div class="h5 mb-0 font-weight-bold text-primary">$4,064,553</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <center>
                                        <div class="col-auto">
                                            <img src="{{ asset('images/dashboard/2.png') }}" width="50%">
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ordenes</div>
                                            <span>(Mes en curso)</span>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">29,483</div>
                                        </div>
                                    </center>
                                    <div class="mt-2 col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Mes anterior</div>
                                        <div class="h5 mb-0 font-weight-bold text-success">189,262</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Proyección</div>
                                        <div class="h5 mb-0 font-weight-bold text-primary">203,848</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <center>
                                        <div class="col-auto">
                                            <img src="{{ asset('images/dashboard/3.png') }}" width="50%">
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Clientes </div>
                                            <span>(Top 5)</span>
                                        </div>
                                    </center>
                                    <div class="mt-2 col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">1. Corpovino</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">2. El Globo SA de CV</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">3. Grupo Modelo</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">4. Primera Plus</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">5. Pirma</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <center>
                                        <div class="col-auto">
                                            <img src="{{ asset('images/dashboard/4.png') }}" width="50%">
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Productos</div>
                                            <span>(Top 5)</span>
                                        </div>
                                    </center>
                                    <div class="mt-2 col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">1. Express</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">2. Cámara TPV</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">3. Embotellado</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">4. Alcohol en Gel</div>
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">5. Guantes Latex</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    {{-- <div class="col-lg-12 mb-4">

                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                            <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                            <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                            <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                            <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                            <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        </div>

                    </div> --}}
                </div>

            </div>
            <!-- /.container-fluid -->
            @endif

        </div>
    </div>
</div>



@endsection
