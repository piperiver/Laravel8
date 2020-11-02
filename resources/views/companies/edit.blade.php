@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
      <h3 class="card-title">MODIFICAR COMPA&Ntilde;IA</h3>
      <p class="card-category">Modifique cualquier campo de la compa&ntilde;ia</p>
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
        <form action="{{ url("Companies/$company->id") }}" method="POST" enctype="multipart/form-data" onSubmit="return confirm('Confirma que desea modificar la información de la compañia?')">
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group bmd-form-group content-logo">
                <label for="logo">Logo</label>
                <input class='form-control' type="file" name="logo" id="logo" accept='.jpeg,.png,.bmp,.gif,.svg,.webp'>

                <div class="logo-upload text-center">
                    <div id="content-logo">
                        <img src="{{ asset($company->url()) }}" id="logo-view">
                    </div>
                    Click aqu&iacute; para cargar el logo
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="name">Nombre</label>
                <input class='form-control' type="text" name="name" id="name" required value='{{ $company->name }}'>
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="email">Correo</label>
                <input class='form-control' type="email" name="email" id="email" value='{{ $company->email }}'>
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="web">P&aacute;gina web</label>
                <input class='form-control' type="url" name="web" id="web" value='{{ $company->web }}' placeholder="incluya https://">
            </div>
            <div class="text-center">
                <button role="submit" class='btn btn-primary'>Modificar</button>
            </div>
            @csrf
        </form>
    </div>
  </div>
@endsection
