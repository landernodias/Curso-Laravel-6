@extends('admin.layouts.app') <!-- importa o tamplete-->

@section ('title', 'Gestão de Produtos')

@section('content')

    <h1>Exibindo os produtos</h1>

    <a href="{{ route('products.create') }}">Cadastrar</a>

    <hr>
    <!-- incluido componentes  -->
    @component('admin.components.card')
    @slot('title')
        <h1>Título Card</h1>
    @endslot    
        Um card de exemplo
    @endcomponent
    <hr>
    <!-- usando includes -->
    @include('admin.includes.alerts', ['content' => 'Alerta de preço de produtos'])
    <hr>
    <!-- estrutura de repetição -->
    <!-- forech -->
    @if(isset($products))
        @foreach ($products as $product)
            <!-- usando variavel loop no foreach e forelse -->
            <p class ="@if($loop->last) last @endif">{{ $product}}</p>
        @endforeach
    @endif
    <hr>
    <!-- forelse -->
    @forelse($products as $product)
        <p class ="@if($loop->first) last @endif">{{$product}}</p>
    @empty
        <p>Não existem produtos cadastrados!</p>
    @endforelse
    <hr>
    <!-- diretivas de verificação -->
    @if ($teste === '123')
        É igual.
    @elseif($teste === 123)
        É exatamente igual
    @else
        Não é igual.
    @endif
    
    <!-- o unless é o if ao contrario ele entra se for falso -->
    @unless ($teste === '123')
        É diferente
    @else
        qualquer coisa
    @endunless

    <!-- Verifica se uma variavel existe -->
    @isset($teste2)
        Essa varivavel existe.
        <p>{{$teste2}}</p>
    @else
        Essa variavel não existe.
    @endisset

    <!-- verifica se uma variavel está vazia -->
    @empty($teste3)
        <p>Vazio...</p>
    @else
        <p>Não esta Vazia...</p>
    @endempty
    <!-- diretiva de altenticação -->
    @auth
        <p>Autenticado</p>
    @else
        <p>Não autenticado</p>
    @endauth

    <!-- Entra se não estiver altenticado  -->
    @guest
        <p>Não está autenticado</p>
    @endguest

    <!-- controle de caso -->
    @switch($teste)
        @case(1)
            Igual 1
            @break
        @case(2)
            Igual 2
            @break
        @case(3)
            Igual 3
            @break
        @case(123)
            Igual 123
            @break
        @default
            Default
    @endswitch
@endsection

@push('styles')
<style>
    .last {
        background: #ccc;
    }
</style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef'
    </script>
@endpush