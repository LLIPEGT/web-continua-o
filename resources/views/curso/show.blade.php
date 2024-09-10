@extends('templates.main')

@section('content')

<div class="card mt-3">
    <div class="card-header">
        Curso
    </div>
    <div class="card-body">
        <h5 class="card-title"><b>{{ $curso->nome}}</b> ({{ $curso->abreviatura}})</h5>
        <p class="card-title">Duração<p>
        <input type="number" name="name" class="form-control" value="{{ $curso->duracao}}" disabled>
        <p class="mt-1  card-title">Eixo</p>
        <input type="text" name="name" class="form-control" value="{{ $curso->eixo->name}}" disabled>
        <a href="{{ route('curso.index') }}" class="btn btn-primary mt-3">Voltar</a>
    </div>
  </div>

@endsection
