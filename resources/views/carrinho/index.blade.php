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

        <a href="{{ $whatsapp }}"
        target="_blank"
        class="flex items-center justify-center gap-3 bg-green-600 hover:bg-green-700
                text-white font-semibold mt-6 px-6 py-3 rounded-xl shadow-lg
                transition duration-200 w-full md:w-auto active:scale-95">

            <!-- Ícone -->
            <svg class="w-7 h-7 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z"
                    clip-rule="evenodd"/>
                <path
                    d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.400-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
            </svg>

            <!-- Texto -->
            <span class="text-lg font-semibold">
                Concluir Pedido pelo WhatsApp
            </span>
        </a>
    @endif
</x-app-layout>
