@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header card-header-primary">
      <h3 class="card-title">CREACI&Oacute;N DE COMPA&Ntilde;IA</h3>
      <p class="card-category">Por favor diligencie todo el formulario para crear una nueva compa&ntilde;ia</p>
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
        <form action="{{ url('Companies') }}" method="post" enctype="multipart/form-data">
            <div class="form-group bmd-form-group content-logo">
                <label for="logo">Logo</label>
                <input class='form-control' type="file" name="logo" id="logo" accept='.jpeg,.png,.bmp,.gif,.svg,.webp'>

                <div class="logo-upload text-center">
                    <div id="content-logo">
                        <img src="" id="logo-view" style='display:none'>
                    </div>
                    Click aqu&iacute; para cargar el logo
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="name">Nombre</label>
                <input class='form-control' type="text" name="name" id="name" required >
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="email">Correo</label>
                <input class='form-control' type="email" name="email" id="email" >
            </div>
            <div class="form-group bmd-form-group">
                <label class='bmd-label-floating' for="web">P&aacute;gina web</label>
                <input class='form-control' type="url" name="web" id="web" placeholder="incluya https://">
            </div>
            <div class="text-center">
                <button role="submit" class='btn btn-primary'>Guardar</button>
            </div>
            @csrf
        </form>
    </div>
  </div>
@endsection
