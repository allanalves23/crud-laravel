@extends('layouts.app')

@section('body')
    <div class="content">
        <div class="mb-3">
            <h4>Página de produtos</h4>
            <h6 class="form-text text-muted">Produtos do sistema</h6>
        </div>
        <div class="mb-5">
            <button class="btn btn-primary" onclick="novoProduto()">Novo produto</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover" id="tabelaProdutos">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Qtde em estoque</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id">
                        <div class="form-group">
                            <label for="nomeProduto">Nome</label>
                            <div class="input-group">
                                <input type="text" id="nomeProduto" class="form-control" placeholder="Nome do produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="qtdeProduto">Quantidade</label>
                            <div class="input-group">
                                <input type="number" min="0" id="qtdeProduto" class="form-control" placeholder="Nome do produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precoProduto">Preço</label>
                            <div class="input-group">
                                <input type="number" min="0" step="0.01" id="precoProduto" class="form-control" placeholder="Nome do produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precoProduto">Departamento</label>
                            <div class="input-group">
                                <select class="form-control" id="departamentoProduto">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Salvar
                        </button>
                        <button onclick="fechaModal()" type="button" class="btn btn-secondary" data-dissmiss="modal"> 
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        })

        $(() => {
            carregarProdutos()
        })

        function carregarProdutos(){
            $.getJSON('/api/produtos', (data) => {
                $('.linha').closest('tr').remove()
                data.forEach(el => {
                    let html = defineLinhaTabela(el)
                    $('#tabelaProdutos').append(html)
                })
            })
        }

        function defineLinhaTabela(dado){
            let string =
                `<tr class="linha">
                    <td>${dado.id}</td>
                    <td>${dado.nome}</td>
                    <td>${dado.estoque}</td>
                    <td>${dado.preco}</td>
                    <td>${dado.categoria_id}</td>
                    <td>
                        <button class="btn btn-sm btn-primary mr-2 mb-2" onclick="editarProduto(${dado.id})">Editar</button>
                        <button class="btn btn-sm btn-danger mr-2 mb-2" onclick="apagarProduto(${dado.id})">Apagar</button>
                    </td>
                </tr>`

            return string
        }

        function carregarCategorias(){
            $.getJSON('/api/categorias', (data) => {
                $('.opcao').closest('option').remove()
                data.forEach(el => {
                    let html = `<option class="opcao" value="${el.id}">${el.nome}</option>` 
                    $('#departamentoProduto').append(html)
                })
            })
        }

        function novoProduto(){
            carregarCategorias()
            $("#nomeProduto").val('')
            $("#qtdeProduto").val('')
            $("#precoProduto").val('')
            $("#departamentoProduto").val('') 
            $("#dlgProdutos").show()
        }

        async function editarProduto(id){
            await carregarCategorias();
            $.getJSON(`/api/produtos/${id}`, (data) => {
                $("#id").val(data.id);
                $("#nomeProduto").val(data.nome);
                $("#qtdeProduto").val(data.estoque);
                $("#precoProduto").val(data.preco);
                $("#departamentoProduto").val(data.categoria_id);
                $("#dlgProdutos").show()
            })
        }
        
        $('#formProduto').submit((evt) => {
            evt.preventDefault()
            let id = $('#id').val()
            let prod = {
                nome: $("#nomeProduto").val(),
                estoque: $("#qtdeProduto").val(),
                preco: $("#precoProduto").val(),
                categoria: $("#departamentoProduto").val()  
            }

            id ? atualizaProduto(prod, id) : salvaProduto(prod)
            
        })

        function salvaProduto(prod){
            $.post('/api/produtos', prod, (data) => {
                if(data && data.length > 0){
                    fechaModal()
                    carregarProdutos()
                }
            })
        }

        function atualizaProduto(prod, id){
            $.ajax({
                type: 'PUT',
                url: `/api/produtos/${id}`,
                context: this,
                data: prod,
                success: () => {
                    fechaModal()
                    carregarProdutos()
                },
                error: (error) =>{
                    console.log(`Ocorreu um erro: ${error.responseText}`)
                }
            })
        }

        function fechaModal(){
            $('#dlgProdutos').hide()
        }
        
        function apagarProduto(id){
            $.ajax({
                type: 'DELETE',
                url: `/api/produtos/${id}`,
                context: this,
                success: () => {
                    carregarProdutos()
                },
                error: (error) => {
                    console.log(`Ocorreu um erro: ${error}`)
                }
            })
        }
    </script>
@endsection