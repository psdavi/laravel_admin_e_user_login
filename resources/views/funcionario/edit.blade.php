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
                    <div class="row">
                        <div class="form-group">
                            <span id="FAKEH1">Editar Perfil</span>
                        </div>
                    </div>
                    <div class="tabela-vertical">
                        <form name="formEditAta" id="formEditAta" method="POST" action="{{ url('dashboard/perfil/'.$u->id) }}">
                            @csrf
                            @method('PUT')

                            <table style="margin-top: 50px; width: auto;">
                                <thead>
                                    <tr>
                                        <th id="th-vertical">Nome</th>
                                        <td id="td-vertical">{{ $u->name}}</td>
                                    </tr>
                                    <tr>
                                        <th id="th-vertical">CPF</th>
                                        <td id="td-vertical">{{ $u->cpf}}</td>
                                    </tr>
                                    <tr>
                                        <th id="th-vertical">Matrícula</th>
                                        <td id="td-vertical">{{ $u->matricula}}</td>
                                    </tr>
                                    <tr>
                                        <th id="th-vertical">Setor</th>
                                        <td id="td-vertical">{{ $u->telefone }}</td>
                                    </tr>
                                    <tr style="color:blue;">
                                        <th id="th-vertical">E-mail</th>
                                        <td id="td-vertical"><input id="semborda" class="form-control" type="text" name="email" id="email" value="{{ $u->email ?? '' }}" required></td>
                                    </tr>
                                    <tr style="color:blue;">
                                        <th id="th-vertical">Telefone</th>
                                        <td id="td-vertical"><input id="semborda" class="form-control" type="text" name="telefone" id="telefone" value="{{ $u->telefone ?? '' }}" required></td>
                                    </tr>
                                    <tr style="color:blue;">
                                        <th id="th-vertical">Endereço</th>
                                        <td id="td-vertical"><b>Cep: </b><input style="width: 150px;" id="semborda" class="form-control" type="text" name="cep" id="cep" value="{{ $u->cep ?? '' }}" required>
                                            <b>Cidade: </b><input style="width: 150px;" id="semborda" class="form-control" type="text" name="cidade" id="cidade" value="{{ $u->cidade ?? '' }}" required>
                                            <b>Bairro: </b><input id="semborda" class="form-control" type="text" name="bairro" id="bairro" value="{{ $u->bairro ?? '' }}" required>
                                            <b>Rua: </b><input id="semborda" class="form-control" type="text" name="rua" id="rua" value="{{ $u->rua ?? '' }}" required>
                                            <b>Nº: </b><input style="width: 100px;" id="semborda" class="form-control" type="text" name="numero" id="numero" value="{{ $u->numero ?? '' }}" required>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                    </div>

                    <x-button style="margin-left: 91%; margin-top: 20px;" type="submit" name="editar" value="Salvar">
                        Salvar
                    </x-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>