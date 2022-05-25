<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>


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
                    <div class="row" style="margin-bottom:40px;">
                        <div class="form-group">
                            <span id="FAKEH1">Cadastrar Ata</span>
                        </div>
                    </div>

                    <div class="col-8 m-auto">
                        <form class="form-inline" name="formAta" id="formAta" method="POST" action="{{ url('atas/store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <div>
                                        <label>Emissor</label>
                                        <input type="text" name="emissor" id="emissor" placeholder="Nome do Emissor" required>
                              
                                        <label>Título</label>
                                        <input type="text" name="titulo" id="titulo" placeholder="Título da Ata" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                
                                    <label>Setor</label>
                                    <input type="text" name="setor" id="setor" placeholder="Setor  da Ata" required>

                                    <label>Pauta</label>
                                    <input type="text" name="pauta" id="pauta" placeholder="Pauta abordada" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" name="descricao" id="descricao" placeholder="Descrição da Ata" required>

                                    <label>Participantes</label>
                                    <input type="text" name="participantes" id="participantes" placeholder="Nomes dos Participantes" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>Conteúdo</label>
                                    <textarea type="text" name="conteudo" id="conteudo" placeholder="O que ocorreu" rows="5" cols="100" required></textarea>

                                    <label>E-mail</label>
                                    <input type="text" name="email" id="email" placeholder="e-mail do emissor" required>

                                    <label>Convidados</label>
                                    <input type="text" name="convidados" id="convidados" placeholder="Pessoas de fora da empresa" required>
                                    <x-button class="ml-4" type="submit" name="cadastrar" value="Cadastrar">
                                        {{ __('Cadastrar') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>