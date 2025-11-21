<x-app-layout>
    <x-slot name="header">
        <!--div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div-->
    </x-slot>

    <main class="container mx-auto px-4 py-8">
        <!-- Promo Carousel -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-6 text-center text-red-600">Promoções Especiais</h2>
            <div class="carousel relative rounded-xl overflow-hidden shadow-lg">
                <div class="carousel-inner flex transition-transform duration-500">
                    <div class="carousel-item w-full flex-shrink-0">
                        <img src="https://img.cdndsgni.com/preview/10030513.jpg" alt="Promoção 1" class="w-full h-96 object-cover">
                    </div>
                    <div class="carousel-item w-full flex-shrink-0">
                        <img src="https://img.cdndsgni.com/preview/11083012.jpg" alt="Promoção 2" class="w-full h-96 object-cover">
                    </div>
                    <div class="carousel-item w-full flex-shrink-0">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhQ-xQoIMvx52WLvkj_oRUVOgpo_Vb3LuH7MHo3aq0bUMTlmr4FdqsiD63ctQ-iptS9GLkfhz2nw1RxyqHyLxkC7rMtKjgLj_TYiZxYrxzMGPSFTURiGUg0M686Awjg3fdfiBh4nnR9gH4/s1600/Ytl0XwBXQzRXYodlRyUici5SbvNmLzNXZyBnclZXas9GM0USZulWYsVmRyUycuV2Zh1WaGJTJz9VL50yXGJTJt92Yu8mcw9WYjF2Yp5Wdt92YGJTJGJTJBNTJwRHdopTM.jpg" alt="Promoção 3" class="w-full h-96 object-cover">
                    </div>
                </div>
                <button class="carousel-prev absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-md hover:bg-white">
                    <i data-feather="chevron-left"></i>
                </button>
                <button class="carousel-next absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-md hover:bg-white">
                    <i data-feather="chevron-right"></i>
                </button>
                <div class="carousel-dots flex justify-center mt-4 space-x-2">
                    <button class="w-3 h-3 rounded-full bg-gray-300"></button>
                    <button class="w-3 h-3 rounded-full bg-gray-300"></button>
                    <button class="w-3 h-3 rounded-full bg-gray-300"></button>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section>
            <h2 class="text-3xl font-bold mb-6 text-center text-red-600">Nosso Cardápio</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <img src="https://www.sabornamesa.com.br/media/k2/items/cache/bf1e20a4462b71e3cc4cece2a8c96ac8_XL.jpg" alt="Hambúrguer Clássico" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Hambúrguer Clássico</h3>
                        <p class="text-gray-600 mb-4">Pão, carne, queijo, alface e molho especial</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-red-600">R$ 18,90</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                Adicionar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSsgAPl-2ZkF5XsrG5UtcRER9ewHicMDzVoQw&s" alt="Hambúrguer Bacon" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Hambúrguer Bacon</h3>
                        <p class="text-gray-600 mb-4">Pão, carne, queijo, bacon crocante e molho barbecue</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-red-600">R$ 22,90</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                Adicionar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <img src="https://academiacorpoesaude.com.br/wp-content/uploads/2024/11/FORMATO-DE-BLOG-8.png" alt="Hambúrguer Vegetariano" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Hambúrguer Vegetariano</h3>
                        <p class="text-gray-600 mb-4">Pão, hambúrguer de grão-de-bico, queijo e vegetais frescos</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-red-600">R$ 19,90</span>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                Adicionar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
        let intervalId = setInterval(next, 5000);
        carousel.addEventListener('mouseenter', () => clearInterval(intervalId));
        carousel.addEventListener('mouseleave', () => {
        clearInterval(intervalId);
        intervalId = setInterval(next, 5000);
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
    </script>
</x-app-layout>
