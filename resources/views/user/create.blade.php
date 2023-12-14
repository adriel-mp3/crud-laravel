@extends('master')

@section('title', 'Cadastrar')
@section('description', 'Faça o cadastro de um Usuário.')

@section('content')
    <div class="mx-5">
        <x-primmary-heading title="Cadastre um Usuário" description="Lembre-se de cadastrar todos os campos corretamente." />
        <x-user-form :action="route('users.store')" method="post">
            <div class="flex justify-center">
                <button class="button text-white bg-green-500 hover:bg-green-600" type="submit">Cadastrar Usuário</button>
            </div>
        </x-user-form>
    </div>
@endsection
