@extends('admin.layouts.app') <!-- importa o tamplete-->

@section ('title', "Detacles do produto {$product->name}")

@section('content')

<h1>Produto {{ $product->name }} <a href="{{ route('products.index') }}"><<</a></h1>
<ul>
    <li>Nome: <strong>{{ $product->name }}</strong></li>
    <li>Preço: <strong>{{ $product->price }}</strong></li>
    <li>Descrição: <strong> {{ $product->description }}</strong></li>
</ul>

<form action="{{ route('products.destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Deletar o Produto: {{ $product->name }}</button>
</form>
@endsection