@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">Usuarios
            <div class="btn-actions-pane-right">
                <div role="group" class="btn-group-sm btn-group">
                    <a href="{{ url('/users/create') }}" class="active btn btn-focus">Crear nuevo</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nombre y Apellido</th>
                    <th class="text-center">Telefono</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Membresia</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th class="text-center" scope="row">{{ $user->id }}</th>
                        <td class="text-center">{{ $user->name . ' ' . $user->lastname}}</td>
                        <td class="text-center">{{ $user->phone }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">
                            @if(!empty($user->getRoleNames()))

                            @foreach($user->getRoleNames() as $v)

                               <label class="badge badge-success">{{ $v }}</label>

                            @endforeach

                          @endif
                        </td>
                        <td class="text-center">{{ $user->membership ? $user->membership->title : '' }}</td>
                        <td class="text-right">
                            <a href="{{ route('users.edit', $user->id) }}" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Editar</a>
                            {{-- <a href="{{ route('memberships-types.destroy', $user->id) }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></a> --}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
