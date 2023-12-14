@extends('master')

@section('title', 'Usuários')
@section('description', 'Gerencie seus usuários com operações de criação, leitura, atualização e exclusão.')

@section('content')

    <div class="mx-5 mb-20">
        @if (session()->has('message'))
            <span class="block font-medium text-green-500 text-center mx-auto mb-4">{{ session()->get('message') }}</span>
        @endif

        <x-primmary-heading title="Lista de Usuários" description="Visualize todos usuários cadastrados." />

        @if (isset($users) && count($users) > 0)
            <x-user-table :users="$users" />
        @else
            <hr class="mb-4">
            <h2 class="text-2xl text-center font-bold mb-2 text-gray-600">Nenhum usuário cadastrado</h2>
            <a href="{{ route('users.create') }}"
                class="text-center block hover:text-blue-600 text-blue-500 underline m-auto w-fit py-2 delay-[3ms]">
                Clique aqui para cadastrar
            </a>
        @endif
    </div>
@endsection
