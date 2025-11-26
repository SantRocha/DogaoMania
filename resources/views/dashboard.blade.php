<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between justify-right">
            <x-button target="_parent" href="{{ route('produtos.create') }}"
                class="justify-center max-w-xs gap-2">
                <img src="https://cdn-icons-png.flaticon.com/512/5787/5787016.png" alt="Lanche" class="w-6 h-6">
                <span>Novo Lache</span>
            </x-button>

            <x-button target="_parent" href="{{ route('promocoes.create') }}"
                class="justify-center max-w-xs gap-2">
                <img src="https://cdn-icons-png.flaticon.com/512/3662/3662441.png" alt="Promoção" class="w-6 h-6">
                <span>Nova Promoção</span>
            </x-button>
        </div>
    </x-slot>

    <main class="container mx-auto px-4 py-8">
        <!-- Promo Carousel -->
        <section class="mb-12">
            @if(isset($promocoes) && $promocoes->count())
                <h2 class="text-3xl font-bold mb-6 text-center text-red-600">Promoções Especiais</h2>
                <div class="carousel rounded-xl overflow-hidden relative">
                    <div class="carousel-inner flex transition-transform duration-500">
                        @foreach($promocoes as $promo)
                            <div class="carousel-item w-full flex-shrink-0">
                                <img src="{{ asset($promo->imagem) }}" alt="Promoção {{ $loop->iteration }}" class="w-full h-full md:h-[500px] object-cover">
                            </div>
                        @endforeach
                    </div>
                    @if ($promocoes->count() > 1)
                        <button class="carousel-prev absolute left-4 top-1/2 -translate-y-1/2">
                            <svg class="w-[37px] h-[37px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                            </svg>
                        </button>
                        <button class="carousel-next absolute right-4 top-1/2 -translate-y-1/2">
                            <svg class="w-[37px] h-[37px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                            </svg>
                        </button>
                    @endif
                    <div class="carousel-dots flex justify-center mt-4 space-x-2">
                        @foreach($promocoes as $promo)
                            <button class="w-3 h-3 rounded-full bg-gray-300"></button>
                        @endforeach
                    </div>
                </div>
            @endif
        </section>

        <!-- Products Section -->
        <section>
            @if(isset($produtos) && $produtos->count())
                <h2 class="text-3xl font-bold mb-6 text-center text-red-600">Nosso Cardápio</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Product 1 -->
                    @foreach($produtos as $produto)
                        <div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                            <img src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" class="w-full h-72 object-cover">

                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $produto->nome }}</h3>
                                <p class="text-gray-600 mb-4 dark:text-gray-50">{{ $produto->descricao ?? '' }}</p>
                                <p class="text-gray-600 mb-4 dark:text-gray-50">{{ $produto->ingredientes ?? '' }}</p>

                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-3xl font-bold text-red-600">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>

                                    <form id="form-add-{{ $produto->id }}" action="{{ route('carrinho.add') }}" method="POST" class="items-center gap-3">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $produto->id }}">

                                        <!-- Contador de quantidade -->
                                        <div class="flex items-center gap-2 mb-3">
                                            <button type="button"
                                                    onclick="changeQty({{ $produto->id }}, -1)"
                                                    class="w-8 h-8 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-full text-lg">
                                                -
                                            </button>

                                            <input id="qty-{{ $produto->id }}"
                                                name="quantidade"
                                                type="text"
                                                value="1"
                                                min="1"
                                                class="w-12 text-center border rounded dark:bg-dark-eval-1">

                                            <button type="button"
                                                    onclick="changeQty({{ $produto->id }}, 1)"
                                                    class="w-8 h-8 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-full text-lg">
                                                +
                                            </button>
                                        </div>

                                        <button type="button"
                                                onclick="addToCart({{ $produto->id }})"
                                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors w-full">
                                            Adicionar
                                        </button>
                                    </form>
                                </div>

                                @if (Auth::user())
                                    {{-- Botões de editar e excluir --}}
                                    <div class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-700">

                                        <a href="{{ route('produtos.edit', $produto->id) }}"
                                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                            Editar
                                        </a>

                                        <form action="{{ route('produtos.destroy', $produto->id) }}"
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

        <div id="toast-success" class="fixed top-5 right-5 z-50 bg-green-600 text-white px-4 py-3 rounded-lg shadow-lg opacity-0 pointer-events-none transition-all duration-300">
            Produto adicionado ao carrinho!
        </div>
    </main>

    <script>
    // Safety: only run when page realmente carregou (imagens inclusive)
    window.addEventListener('load', function () {
        // Replace feather icons only if a função existe (evita erro se lib não estiver incluida)
        if (typeof feather !== 'undefined' && typeof feather.replace === 'function') {
        feather.replace();
        }

        const carousel = document.querySelector('.carousel');
        if (!carousel) return; // nada a fazer se não existe

        const inner = carousel.querySelector('.carousel-inner');
        const items = Array.from(carousel.querySelectorAll('.carousel-item'));
        const prevBtn = carousel.querySelector('.carousel-prev');
        const nextBtn = carousel.querySelector('.carousel-next');
        const dots = Array.from(carousel.querySelectorAll('.carousel-dots button'));

        if (!inner || items.length === 0) return;

        let currentIndex = 0;
        let itemWidth = items[0].clientWidth || carousel.clientWidth;

        // calcula largura atual de item (chame no load e resize)
        function recalcWidths() {
        // usa a largura do primeiro item ou a largura do container como fallback
        itemWidth = items[0].clientWidth || carousel.clientWidth;
        updateCarousel(true); // ajusta posição sem animação forçada
        }

        function updateCarousel(skipAnimation) {
        if (skipAnimation) {
            inner.style.transition = 'none';
        } else {
            inner.style.transition = 'transform 0.5s ease';
        }
        inner.style.transform = `translateX(-${currentIndex * itemWidth}px)`;

        // atualizar dots
        if (dots.length) {
            dots.forEach((dot, i) => {
            dot.classList.toggle('bg-red-600', i === currentIndex);
            dot.classList.toggle('bg-gray-300', i !== currentIndex);
            });
        }

        // re-enable transition (small timeout to ensure DOM applied)
        if (skipAnimation) {
            setTimeout(() => { inner.style.transition = 'transform 0.5s ease'; }, 20);
        }
        }

        // avançar
        function next() {
        currentIndex = (currentIndex + 1) % items.length;
        updateCarousel();
        }

        // voltar
        function prev() {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        updateCarousel();
        }

        // listeners botões
        if (nextBtn) nextBtn.addEventListener('click', next);
        if (prevBtn) prevBtn.addEventListener('click', prev);

        // listeners dots
        if (dots.length) {
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel();
            });
        });
        }

        // auto-rotate com pausa ao passar o mouse
        let intervalId = setInterval(next, 3000);
        carousel.addEventListener('mouseenter', () => clearInterval(intervalId));
        carousel.addEventListener('mouseleave', () => {
        clearInterval(intervalId);
        intervalId = setInterval(next, 3000);
        });

        // recalc widths on resize
        window.addEventListener('resize', recalcWidths);

        // se imagens carregarem depois do load (caso lazy), tentar recalc algumas vezes
        // (seguro) — roda recalc depois de 200ms e 800ms
        setTimeout(recalcWidths, 200);
        setTimeout(recalcWidths, 800);

        // inicializa
        recalcWidths();
    });


    function changeQty(id, amount) {
        const input = document.getElementById('qty-' + id);
        let value = parseInt(input.value);

        value += amount;

        if (value < 1) value = 1;

        input.value = value;
    }


    function addToCart(id) {
        const form = document.getElementById("form-add-" + id);
        const formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": formData.get("_token"),
                "X-Requested-With": "XMLHttpRequest"
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Atualiza o número do carrinho
                const badges = document.querySelectorAll('.carrinho-count');

                badges.forEach(badge => {
                    badge.textContent = data.qtd;

                    if (data.qtd > 0) {
                        badge.classList.remove('hidden');
                    } else {
                        badge.classList.add('hidden');
                    }
                });
            }
        })
    }

    function showToast() {
        const toast = document.getElementById("toast-success");
        toast.style.opacity = "1";
        toast.style.transform = "translateY(0)";

        setTimeout(() => {
            toast.style.opacity = "0";
        }, 2000);
    }
    </script>
</x-app-layout>
