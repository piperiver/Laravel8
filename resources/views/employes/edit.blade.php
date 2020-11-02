@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
      <h3 class="card-title">MODIFICAR EMPLEADO</h3>
      <p class="card-category">Modifique cualquier campo del empleado</p>
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
        @if (session('response'))
            <div class="alert alert-success">
                {{ session('response') }}
            </div>
        @endif
        <form action="{{ url("Employes/$employ->id") }}" method="POST" onSubmit="return confirm('Confirma que desea modificar la información del empleado?')">
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="name">Nombres</label>
                <input class='form-control' type="text" name="name" id="name" required value='{{ $employ->name }}'>
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="surname">Apellidos</label>
                <input class='form-control' type="text" name="surname" id="surname" required value='{{ $employ->surname }}'>
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="company_id">Compa&ntilde;ia</label>
                <select name="company_id" id="company_id" class='form-control'>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ ($employ->company_id == $company->id)? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="email">Correo</label>
                <input class='form-control' type="email" name="email" id="email" value='{{ $employ->email }}'>
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="phone">Tel&eacute;fono</label>
                <input class='form-control' type="tel" name="phone" id="phone" value='{{ $employ->phone }}'>
            </div>
            <div class="text-center">
                <button role="submit" class='btn btn-primary'>Modificar</button>
            </div>
            @csrf
        </form>
    </div>
  </div>
@endsection
