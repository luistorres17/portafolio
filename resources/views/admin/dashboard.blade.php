@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Panel de Administración</h1>
    <a href="{{ route('proyectos.index') }}" class="btn btn-success">Gestionar Proyectos</a>
</div>
@endsection
