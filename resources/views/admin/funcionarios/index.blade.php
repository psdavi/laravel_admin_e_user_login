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
              <span id="FAKEH1">Lista de Funcionários</span>
              <a href="{{ url('admin/dashboard/funcionarios/register') }}">
                <x-button type="submit">
                  Cadastrar Novo Funcionário
                </x-button>
              </a>
            </div>
          </div>

          <div class="form-group">
            <table id="tabela" style="margin-top: 50px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Matrícula</th>
                  <th>Telefone</th>
                  <th>Setor</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($usuario as $u)
                <tr>
                  <td>{{ $u->id }}</td>
                  <td>{{ $u->name }}</td>
                  <td>{{ $u->email }}</td>
                  <td>{{ $u->matricula }}</td>
                  <td>{{ $u->telefone }}</td>
                  <td>{{ $u->telefone }}</td>
                  <td style="width:120px;">
                    <a href="{{ url('admin/dashboard/funcionarios/'.$u->id) }}"><i class="fa fa-eye"></i></a>
                    <a href="{{ url('admin/dashboard/funcionarios/'.$u->id) }}"><i class="fa fa-pencil"></i></a>
                    <a href="{{ url('admin/dashboard/funcionarios/excluir/'.$u->id) }}" class="js-del"><i class="fa fa-trash"></i></a>
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

</x-admin-layout>