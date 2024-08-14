@extends('templates.main')

 @section('content')  
    
    <form action="{{ route('eixo.store') }}" method="POST">
        @csrf
        <label class="mt-3">Nome</label>
        <input type="text" name="name" class="form-control">
        <label class="mt-3">Descrição</label>
        <textarea name="description" rows="5"class="form-control mt-3" >
        </textarea>
        <input type="submit" value="Salvar" class="btn btn-success mt-3">
    </form>     
       
@endsection
