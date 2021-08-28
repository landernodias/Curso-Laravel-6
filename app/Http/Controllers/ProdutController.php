<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Http\Request;

class ProdutController extends Controller
{
    
    protected $request;
    
    public function __construct(Request $request) 
    {
        //dd($request);
        $this->request = $request;
        
       // $this->middleware('auth')->only(['create','edit','update','destroy']);
        // $this->middleware('auth')->except(['index','show','create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $products = Product::get();
        $products = Product::latest()->paginate();

        // return view('teste', [
        //     'teste' => $teste
        // ]);

        return view('admin.pages.produtos.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        dd('OK');
        // dd($request->all());//mostra tudo que foi recebido
        // dd($request->only(['name','description']));//pega dados especificos
        // dd($request->name);//pega o campo especifico
        // dd($request->has('name'));//verifica se existe ou não o campo
        // dd($request->input('model',''));
        // dd($request->except('_token','nome'));//pega todo eceto o name
/*        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image',

        ]);
*/
        if ($request->file('photo')->isValid()){//fazendo upload de arquivo e validando.
            
            // dd($request->photo->extension());//pega extensão do arquivo
            // dd($request->photo->getClientOriginalName());//pega o nome do arquivo.
            // dd($request->file('photo')->store('products'));//upa o arquivo para a aplicação criasndo um novo diretório
            // dd($nameFile);
            
            $nameFile = $request->name . '.' . $request->photo->extension();
            dd($request->file('photo', $nameFile)->storeAS('products/', $nameFile));//upa o arquivo para a aplicação com nome definido

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Detalher do produco com id:{$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.produtos.edit', compact('id'));
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
        dd("Editando produto {$id}");
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
}
