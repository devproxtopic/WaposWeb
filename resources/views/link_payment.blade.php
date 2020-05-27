@extends('layouts.sharable_stripe')

@section('content')
<div class="container">
    <section id="team" class="team">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title" data-aos="fade-right">
                        <h2>WAPOS</h2>
                        <p>Proxtopic te ha enviado una solicitud de pago.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="member row">
                                <div class="member-info col-lg-12">
                                    <h1>Formulario de Pago</h1>


                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                        <div class="modal-content">
                                           
                                            <div class="modal-body">

                                                <form id="payment-form" method="POST" action="/charge">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-md-5 col-form-label "></label>
                                                        <label class="col-md-3 col-form-label " id="title-purchase">Orden No.</label>
                                                        <input for="orderno" name="orderno" id="orderno"  value={{$order}} class=" form-control col-md-2 col-form-label text-align-right" require autofocus disabled>
                                                    </div>

                                                    <div class="form-group row ">
                                                        <label for="client" class="col-md-4 col-form-label " id="title-purchase">Cliente</label>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="name" id="name"  value=" {{customer_Order($order)}}" placeholder="Nombre del cliente" required autofocus disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="ladanumber" id="ladanumber"   value="{{customer_lada_Order($order)}}" placeholder="lada" required autofocus disabled>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="phone" id="phone" value="{{customer_phone_Order($order)}}" placeholder="phone" required autofocus disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row ">
                                                        <label for="country_id" class="col-md-4 col-form-label " id="title-purchase">Precio</label>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="currency" id="currency" value= {{currency_Order($order)}} placeholder="currency" required autofocus disabled>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="${{price_Order($order)}}.00" name="amount" id="amount" required autofocus disabled>
                                                            <input type="hidden" class="form-control" value="{{price_Order($order)}}"  name="amount_db" id="amount_db" required autofocus>

                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-md-5">
                                                            <label for="card-element" id="title-purchase">
                                                                Credit or debit card
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <div style="width: 30em" id="card-element">
                                                                <!-- A Stripe Element will be inserted here. -->
                                                            </div>

                                                            <!-- Used to display Element errors. -->
                                                            <div id="card-errors" role="alert"></div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-success">Pagar</button>
                                                    </div>
                                                </form>
                                                <script src="https://js.stripe.com/v3/"></script>
                                            </div>
                                        </div>
                                    </div>










                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

</div>
</section><!-- End Team Section -->
</div>
@endsection