@extends('master')

@section('title', 'Editar')
@section('description', 'Faça a edição de um Usuário já cadastrado.')

@section('content')
    <x-primmary-heading title="Editar Usuário"
        description="Edite os campos conforme necessário antes de salvar as alterações." />
    <div class="mx-auto w-max flex items-center flex-col mb-4">
        <span class="block text-gray-400 font-bold mb-2">Imagem do Usuário</span>
        <img class="w-24 h-24 mb-3 rounded object-cover" src="{{ asset('img/' . $user->foto) }}"
            alt="Imagem do usuário {{ $user->nome_social ?? $user->nome }}" />
    </div>
    <x-user-form :action="route('users.update', ['user' => $user->id])" method="post" :user="$user">
        @method('put')
        <div class="flex justify-center w-full">
            <button class="button text-white font-medium bg-green-500 hover:bg-green-400" type="submit">
                Salvar Alterações
            </button>
        </div>
    </x-user-form>
@endsection

