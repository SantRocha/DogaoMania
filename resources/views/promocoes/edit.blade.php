<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">Editar Promoção</h2>
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

        <form method="POST" action="{{ route('promocoes.update', $promocao->id) }}" enctype="multipart/form-data" class="bg-white dark:bg-dark-eval-1 p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block font-medium">Imagem da promoção (substituir)</label>
                    <input type="file" name="promocao" class="w-full mt-1 dark:bg-dark-eval-1" accept="image/*">
                </div>
            </div>

            @if ($promocao->promocao)
                <div class="mt-4">
                    <p class="font-medium">Imagem atual:</p>
                    <img src="{{ asset('storage/' . $promocao->promocao) }}" alt="Promoção" class="w-64 h-64 object-cover rounded mt-2">
                </div>
            @endif

            <div class="mt-6">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Salvar Alterações</button>
                <a href="{{ route('dashboard') }}" class="ml-3 text-gray-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
