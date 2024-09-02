@extends('templates.main')

 @section('content')

    <form action="{{ route('curso.store') }}" method="POST">
        @csrf
        <label class="mt-3">Nome</label>
        <input type="text" name="nome" class="form-control">
        <label class="mt-3">Abreviação</label>
        <input type="text" name="abreviatura" class="form-control">
        <label class="mt-3">Duração</label>
        <input type="number" name="duracao" class="form-control">
        <label class="mt-3">Eixo</label>
        <select name="eixo_id" class="form-control" >
            <option value="">
            </option>
            @foreach($eixos as $item)
                <option value="{{ $item->id  }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Salvar" class="btn btn-success mt-3">
    </form>

@endsection
