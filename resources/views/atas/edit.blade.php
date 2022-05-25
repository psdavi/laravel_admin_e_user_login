
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel do Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Editar ata
                    <br>

                    <div class="col-8 m-auto">
                        <form name="formEditAta" id="formEditAta" method="POST" action="{{ url('dashboard/atas/'.$ata->id) }}">
                            @csrf 
                            @method('PUT')
                            <input class="form-control" type="text" name="emissor" id="emissor" placeholder="emissor:" value="{{ $ata->emissor ?? '' }}"><br>
                            <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Título:" value="{{ $ata->titulo ?? '' }}"><br>
                            <input class="form-control" type="text" name="setor" id="setor" placeholder="Setor:" value="{{ $ata->setor ?? '' }}"><br>
                            <input class="form-control" type="text" name="pauta" id="pauta" placeholder="Pauta:" value="{{ $ata->pauta ?? '' }}"><br>
                            <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição:" value="{{ $ata->descricao ?? '' }}"><br>
                            <input class="form-control" type="text" name="participantes" id="participantes" placeholder="Participantes:" value="{{ $ata->participantes ?? '' }}"><br>
                            <input class="form-control" type="text" name="conteudo" id="conteudo" placeholder="Conteúdo:" value="{{ $ata->conteudo ?? '' }}"><br>
                            <input class="form-control" type="text" name="email" id="email" placeholder="email:" value="{{ $ata->email ?? '' }}"><br>
                            <input class="form-control" type="text" name="convidados" id="convidados" placeholder="convidados:" value="{{ $ata->convidados ?? '' }}"><br>
                            <input class="btn btn-primary" type="submit" name="editar" value="Editar" ><br>

                        </form>
                    </div>

                   

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
