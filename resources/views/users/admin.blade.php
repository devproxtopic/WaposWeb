@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu_circles.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Datos Administrativos</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update.admin_users', Auth::id()) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Dirección de Facturación / Pago</label>

                            <div class="col-md-6">
                                <textarea name="address" id="address" cols="30" required autofocus
                                class="form-control @error('address') is-invalid @enderror"
                                rows="10">{{ old('address') ?? $user->address }}</textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="membership_id" class="col-md-4 col-form-label text-md-right">Membresía</label>

                            <div class="col-md-6">
                                <select required autofocus
                                class="form-control @error('membership_id') is-invalid @enderror"
                                name="membership_id" id="membership_id">
                                    <option value="0">Seleccione una opción</option>
                                    @foreach($memberships as $membership)
                                    <option @if($membership->id == $user->membership_id) selected @endif value="{{ $membership->id }}">{{ $membership->title }}</option>
                                    @endforeach
                                </select>

                                @error('membership_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="discount_coupon" class="col-md-4 col-form-label text-md-right">Código de descuento</label>

                            <div class="col-md-6">
                                <input id="discount_coupon" type="text" class="form-control @error('discount_coupon') is-invalid @enderror" name="discount_coupon"
                                 autocomplete="discount_coupon" autofocus value="{{ old('discount_coupon') }}">

                                @error('discount_coupon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Importe</label>

                            <div class="col-md-6">
                                <input readonly id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount"
                                value="{{ old('amount') ?? $user->amount }}" required autocomplete="amount" autofocus>

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 text-right">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Finalizar
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

@section('scripts')
<script src="{{ asset('js/ajax/memberships.js') }}"></script>
@endsection
