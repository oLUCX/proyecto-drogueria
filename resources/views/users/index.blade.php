@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Usuarios</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['code'] }}</td>
                        <td>{{ number_format($user['amount'], 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($user['date'])->format('d-m-Y') }}</td>
                        <td>
                            <button class="btn btn-primary" onclick="editUser({{ $user['id'] }})">Editar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('partials.edit_modal')
    <script src="{{ asset('js/users.js') }}"></script>
@endsection
