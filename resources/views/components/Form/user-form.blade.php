<div class="max-w-[600px] mx-auto mb-5 px-5">
    @if ($errors->any())
        <x-alert-list class="mb-4" label="Ocorreu um erro" :errors="$errors->all()" />
    @endif

    <form id="user-form" action="{{ $action }}" method={{ $method }} enctype="multipart/form-data">
        @csrf
        <x-input id="nome" label="Nome" name="nome" type="text" placeholder="Nome" :value="$user->nome ?? ''" required
            maxlength="50" />
        <x-input id="nome_social" label="Nome Social" name="nome_social" type="text" placeholder="Nome Social"
            :value="$user->nome_social ?? ''" maxlength="50">
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Caso não seja aplicável, deixe o campo em branco.
            </p>
        </x-input>
        <div class="md:grid md:grid-cols-2 gap-4 block">
            <x-input label="CPF / CNPJ" name="cpf_cnpj" type="text" placeholder="999.999.999-99 / 99.999.999/9999-99"
                :value="$user->cpf_cnpj ?? ''" required data-mask="cpf-cnpj" />
            <x-input label="Data de Nascimento" name="data_nascimento" placeholder="00/00/0000" type="date"
                :value="$user->data_nascimento ?? ''" required />
        </div>
        <x-input label="Foto" name="foto" placeholder="00/00/0000" type="file" accept="image/png, image/jpeg" />
        {{ $slot }}
    </form>
</div>

