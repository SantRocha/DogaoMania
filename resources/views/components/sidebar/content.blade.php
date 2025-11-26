<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Cardápio"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/1046/1046747.png" alt="Lanches" class="w-6 h-6">
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Lanches"
        href="{{ route('produtos.lanches') }}"
        :isActive="request()->routeIs('produtos.lanches')"
    >
        <x-slot name="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/5787/5787016.png" alt="Lanches" class="w-6 h-6">
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Marmitas"
        href="{{ route('produtos.marmitas') }}"
        :isActive="request()->routeIs('produtos.marmitas')"
    >
        <x-slot name="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/2082/2082045.png" alt="Lanches" class="w-6 h-6">
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Sobremesas"
        href="{{ route('produtos.sobremesas') }}"
        :isActive="request()->routeIs('produtos.sobremesas')"
    >
        <x-slot name="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/901/901725.png" alt="Lanches" class="w-6 h-6">
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Bebidas"
        href="{{ route('produtos.bebidas') }}"
        :isActive="request()->routeIs('produtos.bebidas')"
    >
        <x-slot name="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/4777/4777276.png" alt="Bebidas" class="w-6 h-6">
        </x-slot>
    </x-sidebar.link>

    @if (Auth::user())
        <x-sidebar.link
            title="Promoções"
            href="{{ route('promocoes.index') }}"
            :isActive="request()->routeIs('promocoes.index')"
        >
            <x-slot name="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/3662/3662441.png" alt="Bebidas" class="w-6 h-6">
            </x-slot>
        </x-sidebar.link>

        <x-sidebar.link
            title="Novo Usuário"
            href="{{ route('register') }}"
            :isActive="request()->routeIs('register')"
        >
            <x-slot name="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png" alt="Bebidas" class="w-6 h-6">
            </x-slot>
        </x-sidebar.link>
    @endif
</x-perfect-scrollbar>
