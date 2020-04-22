@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Registrar cliente</h3>
                </div>

                <div class="card-body">

                    <form id="general_users" method="POST" action="{{ url('/dashboard/clients/create')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Apellido</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" id="descrlastnameiption" required autofocus></input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" id="phone" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control " name="date_of_birth" required autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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


            <div class="card">
                <div class="card-header">
                <h3 id="subtitle-dashboard-wapos">Clientes</h3>    
                </div>

                <div class="card-body">

                <table class="table">
                    <thead class="table">
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Fecha de nacimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buyers as $buyer)
                        <tr>
                            <td>{{$buyer->name}}</td>
                            <td>{{$buyer->lastname}}</td>
                            <td>{{$buyer->phone}}</td>
                            <td>{{$buyer->date_of_birth}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection