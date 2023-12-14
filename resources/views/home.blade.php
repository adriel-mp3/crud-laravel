@extends('master')

@section('title', 'Página Principal')
@section('description', 'Gerencie usuários com operações de criação, leitura, atualização e exclusão.')

@section('content')
    <x-primmary-heading title="Seja Bem-vindo(a)" description="Selecione a opção desejada." />
    <div class="max-w-[1200px] mx-auto px-5 flex items-center flex-col">
        <img class="md:max-w-[400px] max-w-[300px] mb-5" src="{{ asset('img/hero.svg') }}"
            alt="Uma mulher apresentando um projeto">
        <nav>
            <ul class="flex items-center md:gap-10 gap-4 text-black font-medium  md:flex-row flex-col-reverse">
                <li>
                    <a href={{ route('users.index') }} class="button block text-gray-950 hover:text-gray-800 border border-gray-400 bg-zinc-100 hover:bg-zinc-150">Lista de Usuários</a>
                </li>
                <li>
                    <a href="{{ route('users.create') }}"
                        class="button bg-orange-600 block border-gray-100 hover:bg-orange-500 hover:text-white-100">
                        Cadastrar Usuário
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
