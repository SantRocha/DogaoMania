<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between justify-right">
            <x-button target="_parent" href="{{ route('promocoes.create') }}"
                class="justify-center max-w-xs gap-2">
                <img src="https://cdn-icons-png.flaticon.com/512/3662/3662441.png" alt="Promoção" class="w-6 h-6">
                <span>Nova Promoção</span>
            </x-button>
        </div>
    </x-slot>

    <main class="container mx-auto px-4 py-8">
        <!-- Products Section -->
        <section>
            @if(isset($promocoes) && $promocoes->count())
                <h2 class="text-3xl font-bold mb-6 text-center text-red-600">Nosso Cardápio</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Product 1 -->
                    @foreach($promocoes as $promo)
                        <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                            <img src="{{ asset($promo->imagem) }}" alt="{{ $promo->nome }}" class="w-full object-cover">

                            <div class="p-6">
                                @if (Auth::user())
                                    {{-- Botões de editar e excluir --}}
                                    <div class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-700">
                                        <form action="{{ route('promocoes.destroy', $promo->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-colors">
                                                Excluir
                                            </button>
                                        </form>

                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif
        </section>
    </main>
</x-app-layout>
