@extends('layouts.app')

@section('body')
<div class="content">
    <div class="mb-3">
        <h4>Página de categorias</h4>
        <h6 class="form-text text-muted">Categorias do sistema</h6>
    </div>
    <div class="mb-5">
        <a href="{{route('categorias.create')}}" class="btn btn-primary">Nova categoria</a>
    </div>
    <div class="table-responsive">
        @if(isset($categorias) && count($categorias) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de criação</th>
                        <th scope="col">Última atualização</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->nome}}</td>
                            <td>{{$categoria->created_at}}</td>
                            <td>{{$categoria->updated_at}}</td>
                            <td class="d-flex flex-wrap">
                                <a class="btn btn-sm btn-primary mr-2 mb-1" href="{{route('categorias.edit', ['categoria' => $categoria->id])}}">Editar</a>
                                <form action="{{route('categorias.destroy', ['categoria' => $categoria->id])}}" method="POST" class="mr-2 mb-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                <h4>Ops, parece que não existe nenhuma categoria cadastrada. Que tal cadastrar uma agora?</h4>
            </div>
            @endif
    </div>
</div>
@endsection