@extends('layouts.app')

@section('content')
<div class="d-flex flex-column" style="background-color: #D8CDCD; width:20%; height:100%">
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/listaDocumentos">Lista de documentos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/listaProductos">Lista de productos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>
</div>
@endsection