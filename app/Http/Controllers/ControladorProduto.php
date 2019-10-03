<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Produto;
use Exception;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos')->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categorias = Categoria::all();
        return view('novoProduto')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Produto::create([
                "nome" => $request->nome,
                "estoque" => $request->estoque,
                "preco" => $request->preco,
                "categoria_id" => $request->categoria
            ]);

        return redirect()->route('produtos.index');
    }

    public function storeApi(Request $request)
    {
        Produto::create([
                "nome" => $request->nome,
                "estoque" => $request->estoque,
                "preco" => $request->preco,
                "categoria_id" => $request->categoria
            ]);

        $prod = Produto::where('nome', $request->nome)->where('estoque', $request->estoque)->get();
        return json_encode($prod);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**code.. */
    }

    public function showApi($id)
    {
        $produto = Produto::find($id);

        if(isset($produto)){
            return json_encode($produto);
        }else{
            return response('Produto não encontrado na base de dados', 404);
        }

        return response('Ocorreu um erro desconhecido, se persistir reporte', 500);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    public function updateApi(Request $request, $id)
    {
        $produto = Produto::find($id);

        if(isset($produto)){
            $produto->nome = $request->nome;
            $produto->estoque = $request->estoque;
            $produto->preco = $request->preco;
            $produto->categoria_id = $request->categoria;

            $produto->save();
            return json_encode($produto);
        }else{
            return response('Produto não encontrado na base de dados', 404);
        }

        return response('Ocorreu um erro desconhecido, se persistir reporte', 500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroyApi($id)
    {   
        $produto = Produto::find($id);
        if(isset($produto)){
            $produto->delete();
            return response('Produto removido com sucesso', 200);
        }else{
            return response('Produto não encontrado', 404);
        }

        return response('Ocorreu um erro desconhecido, se persistir reporte', 500);
    }

    public function indexJson(){
        $produtos = Produto::all();
        return json_encode($produtos);
    }
}
