<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutController extends Controller
{
    
    protected $request;
    private $repository;
    public function __construct(Request $request, Product $product) 
    {
        //dd($request);
        $this->request = $request;
        $this->repository = $product;
        
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
            'products' => $products,
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
        $data = $request->only('name', 'description', 'price');
    
        if($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('products');//storeAs possibilita definir o nome

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('products.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //verifica se o produto existe

        if(!$product = $this->repository->find($id))
            return redirect()->back();


        return view('admin.pages.produtos.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->where('id', $id)->first();
        if(!$product)
            return redirect()->back();

        return view('admin.pages.produtos.edit', compact('product'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        //verifico se encontra o produto pelo Id no banco de dados
        $product = $this->repository->where('id', $id)->first();
        if(!$product)
            return redirect()->back();

        $data = $request->all();

        if($request->hasFile('image') && $request->image->isValid()) {
            if($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $imagePath = $request->image->store('products');//storeAs possibilita definir o nome
            $data['image'] = $imagePath;
        }

        $product->update($data);
        return redirect()->route('products.index');
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
        $product = $this->repository->where('id', $id)->first();
        if(!$product)
            return redirect()->back();
        if($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index');
    }

    /**
     * Search Products
     */
    public function search(Request $request)
    {
        // $products = Product::latest()->paginate();
        $filters = $request->except('_token');
        $products = $this->repository->search($request->filter);
    
        return view('admin.pages.produtos.index',[
            'products' => $products,
            'filters' => $filters,
        ]);
    }
}
