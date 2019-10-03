@extends('layouts.app')

@section('body')
    <div class="container">
        <h4>Cadastro de produtos</h4>
        <div class="card-border">
            <div class="card-body">
                <form action="{{route('produtos.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome *</label>
                        <input 
                            type="text"
                            class="form-control mb-2"
                            name="nome"
                            id="nome"
                            placeholder="Informe a categoria"
                        >
                        <label for="estoque">Quantidade em estoque *</label>
                        <input 
                            type="number"
                            min="0"
                            class="form-control"
                            name="estoque"
                            id="estoque"
                        >
                        <small class="form-text text-muted mb-2">Informe a quantidade em estoque do produto no momento</small>
                        <label for="preco">Preço *</label>
                        <input 
                            type=""
                            min="0"
                            class="form-control mb-2"
                            name="preco"
                            id="preco"
                        >
                        <label for="categoria">Categoria *</label>
                        <select name="categoria" id="categoria" class="custom-select mb-2">
                            <option value=""></option>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                            @endforeach
                        </select>
                        <p class="form-text text-muted">* Campos obrigatórios</p>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                    <a href="{{route('categorias.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
                </form>
            </div>
        </div>
    </div>    
@endsection