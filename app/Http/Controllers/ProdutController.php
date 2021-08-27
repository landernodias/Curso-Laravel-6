<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutController extends Controller
{
    
    protected $request;
    
    public function __construct(Request $request) 
    {
        //dd($request);
        $this->request = $request;
        
       // $this->middleware('auth')->only(['create','edit','update','destroy']);
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = 123;
        $teste2 = 456;
        $teste3 = [1,2,3,4,5,6];
        $products = ['Tv', 'Geladeira', 'Forno', 'Sofá'];
        $products2 = [];
        // return view('teste', [
        //     'teste' => $teste
        // ]);

        return view('admin.pages.produtos.index', compact('teste', 'teste2', 'teste3','products','products2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
