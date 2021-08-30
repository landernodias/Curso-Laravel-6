@extends('admin.layouts.app')

@section('title', 'Cadastrar Produto')

@section('content')

    <h1> Cadastrar Novo Produto</h1>

    <form action="{{ route('products.store')}}" method="post" enctype="multipart/form-data" class="form">
        @include('admin.pages.produtos._partials.form')
    </form>

@endsection