@extends('layouts.app')

@section('title', ' Create Produtos')

@section('content')
	<div class="max-w-4xl mx-auto px-4 py-10">
		<div class="mb-6 flex items-center justify-between">
			<h1 class="text-2xl font-semibold text-gray-800">New Product</h1>

			<a href="{{ route ('products') }}" class="inline-flex items-center px-3 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
				Voltar
			</a>
		</div>

		<!-- Formulário de criação -->
		@if ($errors->any())
			<div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-700 rounded">
				<ul class="list-disc pl-5">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<form action="{{ route('productsStore') }}" method="post" class="bg-white p-6 rounded-md shadow-sm">
			@csrf

			<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
				<div class="md:col-span-2">
					<label class="block text-sm font-medium text-gray-700">Nome</label>
					<input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100/60 transition-colors duration-150">
				</div>

				<div>
					<label class="block text-sm font-medium text-gray-700">Preço</label>
					<div class="mt-1 relative">
						<span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">R$</span>
						<input type="text" name="price" value="{{ old('price') }}" class="block w-full rounded-md border-gray-200 shadow-sm pl-10 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100/60 transition-colors duration-150" aria-label="Preço">
					</div>
				</div>

				<div>
					<label class="block text-sm font-medium text-gray-700">Quantidade</label>
					<input type="number" name="quantity" value="{{ old('quantity', 0) }}" class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100/60 transition-colors duration-150">
				</div>

				<div class="md:col-span-3">
					<label class="block text-sm font-medium text-gray-700">Descrição (opcional)</label>
					<textarea name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100/60 transition-colors duration-150">{{ old('description') }}</textarea>
				</div>
			</div>

			<div class="mt-4 flex items-center justify-end gap-3">
				<a href="{{ url('/products') }}" class="px-4 py-2 bg-gray-100 rounded-md">Cancelar</a>
				<button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700">Salvar Produto</button>
			</div>
		</form>
	</div>
@endsection