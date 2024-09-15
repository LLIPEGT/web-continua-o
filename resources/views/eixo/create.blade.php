@extends('templates.main')

 @section('content')

    <form action="{{ route('eixo.store') }}" method="POST">
        @csrf
        <label class="mt-3">Nome</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
        @if($errors->has('name'))
            <div class='invalid-feedback'>
                {{ $errors->first('name') }}
            </div>
        @endif

        <label class="mt-3">Descrição</label>
        <textarea name="description" rows="5" class="form-control mt-3 {{ $errors->has('name') ? 'is-invalid' : '' }}" >
            {{old('name')}}
        </textarea>
        @if($errors->has('description'))
            <div class='invalid-feedback'>
                {{ $errors->first('description') }}
            </div>
        @endif
        <input type="submit" value="Salvar" class="btn btn-success mt-3">
    </form>

@endsection
