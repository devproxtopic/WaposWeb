@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">Documentos</h3>
                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6 text-right">
                                <button type="submit" class="btn btn-success editar-documentos">
                                    Editar
                                </button>
                            </div>
                        </div>
                </div>

                <div class="card-body">

                    <form id="general_users" method="POST" action="{{ url('/dashboard/products/create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">País</label>

                            <div class="col-md-4">
                                <select name="currency" class="form-control country-select">
                                    <option value="mxn" name="buyer_id">México</option>
                                    <option value="ugy" name="buyer_id">Uruguay</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="acta" id="acta" class="col-md-4 col-form-label text-md-right">Acta constitutiva</label>

                            <div class="col-md-6">
                                <button type="button" class="btn btn-success save-general-user">+Archivo</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cedula" id="cedula" class="col-md-4 col-form-label text-md-right">Cédula fiscal</label>

                            <div class="col-md-6">
                                <button type="button" class="btn btn-success save-general-user">+Archivo</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="constancia" id="constancia" class="col-md-4 col-form-label text-md-right">Constancia de domicilio</label>

                            <div class="col-md-6">
                                <button type="button" class="btn btn-success save-general-user">+Archivo</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Notas</label>

                            <div class="col-md-6">
                                <textarea class="col-md-6 "></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6 text-right">
                                <button type="submit" class="btn btn-success save-general-user">
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
</div>
@endsection