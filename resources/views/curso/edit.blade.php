@extends('templates.main')

@section('content')
    <form action="{{ route('curso.update', $curso->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label class="mt-3">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $curso['nome'] }}">
        <label class="mt-3">Abreviação</label>
        <input type="text" name="abreviatura" class="form-control" value="{{ $curso['abreviatura'] }}">
        <label class="mt-3">Duração</label>
        <input type="number" name="duracao" class="form-control" value="{{ $curso['duracao'] }}">
        <label class="mt-3">Eixo</label>
        <select name="eixo_id" class="form-control" value="{{ $curso->eixo_id }}">
            @foreach($eixos as $item)
                <option value="{{ $item->id }}" {{$curso->eixo_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Alterar" class="btn btn-success mt-3">
    </form>

@endsection

