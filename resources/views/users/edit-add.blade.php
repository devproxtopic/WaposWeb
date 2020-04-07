@extends('layouts.admin')

@section('content')

{{-- Variables para switch de vistas --}}
@php
    $title ='Crear Usuario';

    if(! $create){
        $title = 'Actualizar Usuario';
    }

    $url = URL::route('users.store');

    if(! $create){
        $url = URL::route('users.update', ['id' => $user->id]);
    }

@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $title }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ $url }}">
                        @csrf

                        @if(! $create)
                            @method('PUT')
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                @if($user) value="{{ old('name') ?? $user->name }}" @else value="{{ old('name') }}" @endif
                                required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                @if($user) value="{{ old('lastname') ?? $user->lastname }}" @else value="{{ old('lastname') }}" @endif
                                required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                @if($user) value="{{ old('phone') ?? $user->phone }}" @else value="{{ old('phone') }}" @endif
                                required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                @if($user) value="{{ old('email') ?? $user->email }}" @else value="{{ old('email') }}" @endif
                                required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">Rol</label>

                            <div class="col-md-6">
                                <select required class="form-control @error('rol') is-invalid @enderror" name="rol" id="rol">
                                    <option value="0">Seleccione una opción</option>
                                    @foreach($roles as $role)
                                    <option @if($user && $user->getRoleNames()[0] == $role->name) selected @endif>
                                    {{ $role->name }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('rol')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 text-right">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Guardar
                                </button>
                                <a href="{{ url('/users') }}" class="btn btn-primary">
                                    Volver
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
