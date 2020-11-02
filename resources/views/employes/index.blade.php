@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
      <h3 class="card-title">EMPLEADOS</h3>
      <p class="card-category">Listado de empleados</p>
      <a href="{{ url('Employes/create') }}" class='btn btn-info create'>
        <span class="material-icons">
            add
        </span>
        Empleado
      </a>
    </div>
    <div class="card-body">
        @if (session('response'))
            <div class="alert alert-success">
                {{ session('response') }}
            </div>
        @endif

        <table class='table table-hover'>
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Compa&ntilde;ia</th>
                    <th>Correo</th>
                    <th>Tel&eacute;fono</th>
                    <th>Fecha de creaci&oacute;n</th>
                    <th>&Uacute;ltima modificaci&oacute;n</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employes as $employ)
                    <tr>
                        <td>{{ $employ->name }}</td>
                        <td>{{ $employ->surname }}</td>
                        <td>{{ $employ->company->name }}</td>
                        <td>{{ $employ->email }}</td>
                        <td>{{ $employ->phone }}</td>
                        <td>{{ $employ->created_at }}</td>
                        <td>{{ $employ->updated_at }}</td>
                        <td>
                            <a href="{{ url("Employes/$employ->id/edit") }}"  rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Modificar Empleado">
                                <span class="material-icons text-info">
                                    edit
                                </span>
                            </a>
                            <form action="{{ url("Employes/$employ->id") }}" method="POST" onSubmit="return confirm('Confirma que desea eliminar el empleado?')">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Eliminar Empleado">
                                    <i class="material-icons text-danger">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $employes->links() }}
    </div>
  </div>
@endsection
