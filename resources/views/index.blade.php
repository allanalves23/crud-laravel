@extends('layouts.app')

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck w-100">
                <div class="card border border-primary col-md-6">
                    <div class="card-body">
                        <div class="card-title">Cadastro de produtos</div>
                        <p class="card-text">Cadastre os produtos</p>
                        <a href="/produtos" class="btn btn-primary">Cadastrar</a>
                    </div>
                </div>
                <div class="card border border-primary col-md-6">
                    <div class="card-body">
                        <div class="card-title">Cadastro de departamentos</div>
                        <p class="card-text">Cadastre os departamentos</p>
                        <a href="/departamentos" class="btn btn-primary">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
