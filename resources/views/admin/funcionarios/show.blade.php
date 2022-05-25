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

<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel do Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="form-group">
                            <span id="FAKEH1">Informações do Funcionário</span>
                        </div>

                        <div class="tabela-vertical">
                            <table style="margin-top: 50px; width: auto;">
                                <thead>
                                    <tr>
                                        <th id="th-vertical">Nome</th>
                                        <td id="td-vertical">{{ $u->name }}</td>
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
                                    <tr>
                                        <th id="th-vertical">E-mail</th>
                                        <td id="td-vertical">{{ $u->email }}</td>
                                    </tr>
                                    <tr>
                                        <th id="th-vertical">Telefone</th>
                                        <td id="td-vertical">{{ $u->telefone }}</td>
                                    </tr>
                                    <tr>
                                        <th id="th-vertical">Endereço</th>
                                        <td id="td-vertical"><b>Cep: </b>{{ ''.$u->cep.','}} <b>Cidade: </b>{{''.$u->cidade.','}} <b>Bairro: </b> {{''.$u->bairro.','}} <b>Rua: </b> {{''.$u->rua.','}} <b>Bairro: </b> {{''.$u->bairro.','}} <b>Número: </b>{{''.$u->numero }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-admin-layout>