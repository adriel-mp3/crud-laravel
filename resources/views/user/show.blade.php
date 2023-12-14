@extends('master')

@section('title', 'Editar')
@section('description', 'Visualize os dados do usuário escolhido.')

@section('content')
    <x-primmary-heading title="Visualizar dados" description="Visualize os dados do usuário selecionado." />
    <div class="max-w-[1200px] mx-auto py-5">
        <span class="text-gray-400 font-medium block text-center mb-1">Foto do usuário</span>
        <img class="rounded w-36 h-36 object-cover mx-auto mb-4" src="{{ asset('img/' . $user->foto) }}"
            alt="Imagem do usuário {{ $user->nome_social ?? $user->nome }}" />
        <span class="text-gray-400 font-medium block text-center mb-1">Nome</span>
        <p class="text-gray-700 text-center text-xl">{{ $user->nome }}</p>
        <hr class="w-48 h-[1px] mx-auto my-1 bg-gray-200 border-0 md:my-2">
        @if (isset($user->nome_social))
            <span class="text-gray-400 font-medium block text-center mb-1">Nome Social</span>
            <p class="text-gray-700 text-center text-xl">{{ $user->nome_social }}</p>
            <hr class="w-48 h-[1px] mx-auto my-1 bg-gray-200 border-0 md:my-2">
        @endif
        <span class="text-gray-400 font-medium block text-center mb-1">Data de Nascimento</span>
        <p class="text-gray-700 text-center text-xl">{{ $user->data_nascimento }}</p>
        <hr class="w-48 h-[1px] mx-auto my-1 bg-gray-200 border-0 md:my-2">
        <span class="text-gray-400 font-medium block text-center mb-1">CPF / CNPJ</span>
        <p class="text-gray-700 text-center text-xl" data-mask="cpf_cnpj">{{ $user->cpf_cnpj }}</p>
        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
            class="button font-medium bg-blue-600 hover:bg-blue-700 block w-max mx-auto mt-6" aria-label="Editar usuário">
           Editar Usuário
        </a>
    </div>
@endsection
