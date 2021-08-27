@extends('admin.layouts.app')

@section('title', 'Editar Produto')

@section('content')
    <h1> Editar Produto {{ $id }}</h1>

    <form action="{{ route('products.update', $id)}}" method="post">
        @method('PUT')
        <!-- <input type="hidden" name="_method" value="PUT"> -->
        @csrf
        <!-- <input type="text" name="_token" value=" {{ csrf_token() }} "> -->
        <input type="text" name="name" placeholder="Nome:">
        <input type="text" name="description" placeholder="Descrição:">
        <button type="submit">Enviar</button>
    </form>
@endsection