<x-app-layout>
    <x-slot name="header"></x-slot>

    <h2 class="text-3xl font-bold mb-6 text-center text-red-600">Seu Carrinho</h2>

    @if(!$carrinho)
        <p class="text-center text-lg">Carrinho vazio 💨</p>
    @else
        <div class="space-y-4">

            @php
                $mensagem = "Boa Noite%0AQuero pedir:%0A%0A";
            @endphp

            @foreach($carrinho as $item)

                @php
                    $mensagem .= "{$item['quantidade']}x {$item['nome']} - R$ ".number_format($item['preco'],2,',','.')."%0A";
                @endphp

                <div class="flex items-center bg-white dark:bg-slate-800 rounded-xl shadow p-4">

                    {{-- IMAGEM --}}
                    <img src="{{ asset($item['imagem']) }}"
                         class="w-24 h-24 object-cover rounded-lg shadow mr-4">

                    {{-- INFO --}}
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold">{{ $item['nome'] }}</h3>
                        <p class="text-red-600 font-bold text-xl">
                            R$ {{ number_format($item['preco'], 2, ',', '.') }}
                        </p>

                        {{-- CONTROLE DE QUANTIDADE --}}
                        <form action="{{ route('carrinho.update') }}" method="POST" class="flex items-center mt-2 gap-2">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['id'] }}">

                            <button type="submit" name="action" value="menos"
                                    class="w-8 h-8 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-full text-lg">
                                –
                            </button>

                            <span class="text-lg font-bold w-8 text-center">
                                {{ $item['quantidade'] }}
                            </span>

                            <button type="submit" name="action" value="mais"
                                    class="w-8 h-8 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-full text-lg">
                                +
                            </button>
                        </form>
                    </div>

                    {{-- BOTÃO REMOVER --}}
                    <form method="POST" action="{{ route('carrinho.remove') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item['id'] }}">

                        <button>
                            <x-trash aria-hidden="true" class="w-10 h-10" />
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        {{-- BOTÃO CONCLUIR PEDIDO --}}
        @php
            $whatsapp = "https://wa.me/5568992346556?text=" . $mensagem;
        @endphp

        <div class="mt-6 text-center">
            <a href="{{ $whatsapp }}"
               target="_blank"
               class="bg-green-600 text-white px-6 py-3 rounded-lg text-xl shadow hover:bg-green-700 transition">
                Concluir Pedido pelo WhatsApp
            </a>
        </div>
    @endif
</x-app-layout>
