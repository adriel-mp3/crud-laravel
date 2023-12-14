@extends('master')

@section('title', '404 - Página não encontrada')
@section('description', 'A página que você acessou, não existe.')

@section('content')
    <x-primmary-heading title="Página não encontrada"
        description="A página que você acessou, não existe." />
    <div class="max-w-[1200px] mx-auto px-5 flex justify-center">
        <img class="md:max-w-[400px] max-w-[300px] mb-5" src="{{ asset('img/404.svg') }}"
            alt="Uma homem e um texto escrito Oops! 404">

    </div>
    <a href="{{ route('home') }}"
        class="text-center block text-blue-500 hover:text-blue-600 delay-[3ms] underline text-xl">Voltar para página
        inicial</a>
@endsection
