@extends('layouts.app')

@section('body')
    <div class="container">
        <h4>Edição de categorias</h4>
        <div class="card-border">
            <div class="card-body">
                <form action="{{route('categorias.update', ['categoria' => $categoria->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nomeCategoria">Categoria</label>
                        <input 
                        type="text"
                        class="form-control"
                        name="nomeCategoria"
                        id="nomeCategoria"
                        value="{{$categoria->nome}}"
                        placeholder="Informe a categoria">
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                    <a href="{{route('categorias.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
                </form>
            </div>
        </div>
    </div>    
@endsection