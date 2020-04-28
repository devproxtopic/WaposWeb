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

                    <form  method="POST" action="{{ url('/dashboard/files/update')}}" enctype="multipart/form-data">
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
                                <input type="file" class="form-control-plaintext" name="acta_constitutiva">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cedula" id="cedula" class="col-md-4 col-form-label text-md-right">Cédula fiscal</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-plaintext" name="cedula_fiscal">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="acta" id="acta" class="col-md-4 col-form-label text-md-right">Constancia de domicilio</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-plaintext" name="constancia_domicilio">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="notas" class="col-md-4 col-form-label text-md-right">Notas</label>

                            <div class="col-md-8">
                                <textarea id="notas"></textarea>
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
                    <input style="display: none" name="name" value="{{$business->name}}">
                    <input style="display: none" name="razon_social" value="{{$business->razon_social}}">
                    <input style="display: none" name="rfc_rut_cuit" value="{{$business->rfc_rut_cuit}}">
                    <input style="display: none" name="address" value="{{$business->address}}">
                    <input style="display: none" name="postal_code" value="{{$business->postal_code}}">
                    <input style="display: none" name="phone" value="{{$business->phone}}">
                    <input style="display: none" name="email" value="{{$business->email}}">
                    <input type="password" style="display: none" name="pin" value="{{$business->pin}}">
                    <input type="password" style="display: none" name="pin_confirmation" value="{{$business->pin_confirmation}}">
                    <input style="display: none" name="client_id" value="{{$business->client_id}}">
                    <input style="display: none" name="ladanumber" value="{{$business->ladanumber}}">


                </div>


            </div>





        </div>
    </div>
</div>
</div>
@endsection