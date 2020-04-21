@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 id="subtitle-dashboard-wapos">POS</h3>
                </div>

                <div class="card-body" style="color: green">
                    <form id="general_users" method="POST" action="{{ url('')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Cliente</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Producto</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_id" id="product_id" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">Mensaje</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="message" id="message" required autofocus></textarea>
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





        </div>
    </div>
</div>
</div>
@endsection