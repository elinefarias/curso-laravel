@extends('layouts.app')

@section('title', 'Produtos')


@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <header class="mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Produtos</h1>
        <p class="text-gray-600 mt-1">Lista de produtos cadastrados</p>

        <div class="mt-4">
            <a href="{{route('productsCreate')}}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-md shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-300">
                Adicionar Produto
            </a>
        </div>
    </header>

    @if(session('success'))
        <div class="mb-4 max-w-6xl mx-auto px-4">
            <div class="p-4 rounded-md bg-emerald-50 border border-emerald-200 text-emerald-800">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <div class="p-4 border-b">
            <h2 class="text-lg font-medium text-gray-700">Tabela de Produtos</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                   @foreach($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->id}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->quantity}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
