@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
      <h3 class="card-title">COMPA&Ntilde;IAS</h3>
      <p class="card-category">Listado de compa&ntilde;ias</p>
      <a href="{{ url('Companies/create') }}" class='btn btn-info create'>
        <span class="material-icons">
            add
        </span>
        compa&ntilde;ia
      </a>
    </div>
    <div class="card-body">
        @if (session('response'))
            <div class="alert alert-success">
                {{ session('response') }}
            </div>
        @endif
        @if (session('err'))
            <div class="alert alert-danger">
                {{ session('err') }}
            </div>
        @endif

        <table class='table table-hover'>
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>P&aacute;gina web</th>
                    <th>Fecha de creaci&oacute;n</th>
                    <th>&Uacute;ltima modificaci&oacute;n</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>
                            @if(!empty($company->logo))
                                <img src="{{ asset($company->url()) }}" class='logo-list'>
                            @endif
                        </td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td title="{{ $company->web }}">{{ substr($company->web, 0, 30) }}</td>
                        <td>{{ $company->created_at }}</td>
                        <td>{{ $company->updated_at }}</td>
                        <td>
                            <a href="{{ url("Companies/$company->id/edit") }}"  rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Modificar Compañia">
                                <span class="material-icons text-info">
                                    edit
                                </span>
                            </a>
                            <form action="{{ url("Companies/$company->id") }}" method="POST" onSubmit="return confirm('Confirma que desea eliminar esta compañia?')">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Eliminar Compañia">
                                    <i class="material-icons text-danger">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
  </div>
@endsection
