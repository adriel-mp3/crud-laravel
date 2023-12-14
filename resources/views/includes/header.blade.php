<header class="bg-orange-600 flex gap-4 items-center justify-between px-10 py-5 mb-16 md:mb-20 sm:flex-row flex-col">
    <a href="{{ route('home') }}" class="text-4xl text-white">CRUD</a>
    <nav>
        @unless (request()->routeIs('home'))
            <ul class="flex items-center gap-5 text-white font-medium sm:flex-row flex-col">
                <li>
                    <a href={{ route('users.index') }} class="hover:underline">Lista de Usuários</a>
                </li>
                <li>
                    <a href="{{ route('users.create') }}"
                        class="button block border-white hover:bg-white hover:text-orange-600">
                        Cadastrar Usuário
                    </a>
                </li>
            </ul>
        @endunless
    </nav>
</header>
