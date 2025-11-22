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
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/5787/5787016.png" alt="Lanches" class="w-6 h-6">
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Marmitas"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/2082/2082045.png" alt="Lanches" class="w-6 h-6">
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Sobremesas"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/901/901725.png" alt="Lanches" class="w-6 h-6">
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Bebidas"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <img src="https://cdn-icons-png.flaticon.com/512/4777/4777276.png" alt="Bebidas" class="w-6 h-6">
        </x-slot>
    </x-sidebar.link>



</x-perfect-scrollbar>
