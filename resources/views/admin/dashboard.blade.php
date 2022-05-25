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
                            <span id="FAKEH1">Funcionários</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" id="search" onkeyup="pesquisar()" placeholder="Search for names..">
                        <!-- <input id="search" style="border:1px solid blue;" name="search" value="AQUI!" /> -->
                        <!-- <button style="border:1px solid ;" onclick="pesquisar();">PESQUISAR</button> -->
                    </div>



                    <div class="form-group">
                        <table id="tabela" style="margin-top: 50px;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Matricula</th>
                                    <th>Setor</th>
                                    <th style="width:400px ;">Tornar Emissor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuario as $u)
                                <tr>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->matricula}}</td>
                                    <td>{{ $u->setor}}</td>
                                    <td style="width:120px;">
                                        <label style="margin-left:10px"><b>Data Início: </b><input style="width:150px;" id="date" type="date" value="2022-05-24"></label>
                                        <label style="margin-left:10px"><b>Data Fim: </b><input style="width:150px;margin-left:14px" id="date" type="date" value="2022-05-30"><a style="width:150px;margin-left:20%;" href="{{ url('admin/dashboard/funcionarios/'.$u->id) }}"><i class="fa fa-edit"></i></a></label>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- scipt importando o js para o botao de delete-->
    <script src="{{ url('js/deleteuser.js') }}"></script>
    <script>
        function pesquisar() {
            // Declare variables
            var input, filter, table, tr, td, i, valorPesquisa;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabela");
            tr = table.getElementsByTagName("tr");

            // Percorre todas as linhas da tabela e oculta aquelas que não correspondem à consulta de pesquisa
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    valorPesquisa = td.textContent || td.innerText;
                    if (valorPesquisa.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</x-admin-layout>

<!-- function pesquisar() {
            var pesquisa = document.getElementById('search').value;
            alert(pesquisa);

            var tabela = document.getElementById('tabela');
            tabela.filter();
            
        } -->