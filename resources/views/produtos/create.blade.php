<x-app-layout>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight">Criar Lanche</h2>
	</x-slot>

	<div class="container mx-auto px-4 py-6">
		@if ($errors->any())
			<div class="mb-4 p-4 bg-red-100 text-red-700 rounded dark:bg-red-900 dark:text-red-200">
				<ul class="list-disc pl-5">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data" class="bg-white dark:bg-dark-eval-1 p-6 rounded shadow">
			@csrf

			<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<div>
					<label class="block font-medium">Nome</label>
					<input type="text" name="nome" value="{{ old('nome') }}" class="w-full mt-1 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" required>
				</div>

				<div>
					<label class="block font-medium">Categoria</label>
                    <select name="categoria" class="w-full mt-1 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" required>
                        <option value="">Selecione uma categoria</option>
                        <option value="Marmitas">Marmitas</option>
                        <option value="Lanches">Lanches</option>
                        <option value="Sobremesas">Sobremesas</option>
                        <option value="Bebidas">Bebidas</option>
                    </select>
				</div>

				<div class="md:col-span-2">
					<label class="block font-medium">Descrição</label>
					<textarea name="descricao" rows="4" class="w-full mt-1 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">{{ old('descricao') }}</textarea>
				</div>

				<div class="md:col-span-2">
					<label class="block font-medium">Ingredientes (opcional)</label>
					<textarea name="ingredientes" rows="3" class="w-full mt-1 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">{{ old('ingredientes') }}</textarea>
				</div>

				<div>
					<label class="block font-medium">Preço (R$)</label>
					<input type="number" step="0.01" name="preco" value="{{ old('preco') }}" class="w-full mt-1 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" required>
				</div>

				<div>
					<label class="block font-medium">Imagem (jpg, png, webp)</label>
					<input type="file" name="imagem" class="w-full mt-1 dark:bg-dark-eval-1" required>
				</div>
			</div>

			<div class="mt-6">
				<button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Criar Produto</button>
				<a href="{{ route('dashboard') }}" class="ml-3 text-gray-600 dark:text-gray-300">Cancelar</a>
			</div>
		</form>
	</div>
</x-app-layout>
