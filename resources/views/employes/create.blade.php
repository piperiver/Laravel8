@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
      <h3 class="card-title">CREACI&Oacute;N DE EMPLEADOS</h3>
      <p class="card-category">Por favor diligencie todo el formulario para crear un nuevo empleado</p>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('Employes') }}" method="post">

            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="name">Nombres</label>
                <input class='form-control' type="text" name="name" id="name" required >
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="surname">Apellidos</label>
                <input class='form-control' type="text" name="surname" id="surname" required >
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="company_id">Compa&ntilde;ia</label>
                <select name="company_id" id="company_id" class='form-control'>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="email">Correo</label>
                <input class='form-control' type="email" name="email" id="email" >
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="phone">Tel&eacute;fono</label>
                <input class='form-control' type="tel" name="phone" id="phone" >
            </div>
            <div class="text-center">
                <button role="submit" class='btn btn-primary'>Guardar</button>
            </div>
            @csrf
        </form>
    </div>
  </div>
@endsection
