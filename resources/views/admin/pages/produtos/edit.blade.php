@extends('admin.layouts.app')

@section('title', "Editar Produto {$product->name}")

@section('content')
    <h1> Editar Produto {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        <!-- <input type="hidden" name="_method" value="PUT"> -->

        @include('admin.pages.produtos._partials.form')
    </form>
@endsection