@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Datos bancarios</h3>
                </div>

                <div class="card-body" style="color: green">
                    <form id="general_users" method="POST" action="{{ url('/dashboard/products/create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="Country" class="col-md-4 col-form-label text-md-right">País</label>

                            <div class="col-md-4">
                                <select name="currency" class="form-control">
                                    <option value="mxn">México</option>
                                    <option value="ugy">Uruguay</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank" class="col-md-4 col-form-label text-md-right">Banco</label>

                            <div class="col-md-4">
                                <select name="currency" class="form-control">
                                    <option value="santander">Santander</option>
                                    <option value="hsbc">HSBC</option>
                                    <option value="bbva">BBVA</option>
                                    <option value="citibanamex">Citibanamex</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="titular" class="col-md-4 col-form-label text-md-right">Titular</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="titular" id="titular" placeholder="Nombre del titular*" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_cuenta" class="col-md-4 col-form-label text-md-right">No. Cuenta</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="no_cuenta" id="no_cuenta" placeholder="Número de cuenta*" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clabe" class="col-md-4 col-form-label text-md-right">CLABE</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="clabe" id="clabe" placeholder="CLABE" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clabe" class="col-md-4 col-form-label text-md-right">Tarjeta</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" onkeypress="return checkNumberCard(event)" name="card-number" id="card-number" placeholder="Inserte los dígitos de su tarjeta" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="constancia" id="constancia" class="col-md-4 col-form-label text-md-right">Carátula bancaria</label>

                            <div class="col-md-6">
                                <button type="button" class="btn btn-success save-general-user">+Archivo o imagen</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="notas" class="col-md-4 col-form-label text-md-right">Notas</label>

                            <div class="col-md-6">
                                <textarea class="col-md-6 " id="notas"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6 text-right">
                                <button type="submit" class="btn btn-success save-bank-data">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection