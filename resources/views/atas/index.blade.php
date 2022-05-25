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
              <span id="FAKEH1">Lista de Atas</span>
              <a href="{{ url('atas/create') }}">
                <x-button style="margin-left: 21%;" type="submit">
                  Criar Nova Ata
                </x-button>
              </a>
            </div>
          </div>

          <div class="form-group">
            @csrf
            <table id="tabela" style="margin-top: 50px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Emissor</th>
                  <th>Email</th>
                  <th>Setor</th>
                  <th>Pauta</th>
                  <th>Descrição</th>
                  <th>Participantes</th>
                  <th>Convidados</th>
                  <th>Conteúdo</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($ata as $atas)
                <!-- pega o nome do usuario da tabela user pelo id-->
                @php
                $user = $atas->find($atas->id)->relUsers;
                @endphp
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $atas->email }}</td>
                  <td>{{ $atas->setor }}</td>
                  <td>{{ $atas->pauta }}</td>
                  <td>{{ $atas->descricao }}</td>
                  <td>{{ $atas->participantes }}</td>
                  <td>{{ $atas->convidados }}</td>
                  <td>{{ $atas->conteudo }}</td>
                  <td style="width:120px;">
                    <a href="{{ url('dashboard/atas/'.$atas->id) }}"><i class="fa fa-eye"></i></a>
                    <a href="{{ url('dashboard/atas/'.$atas->id.'/editar') }}"><i class="fa fa-pencil"></i></a>
                    <a href="{{ url('dashboard/atas/excluir/'.$atas->id) }}" class="js-del"><i class="fa fa-trash"></i></a>
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
  <script src="{{ url('js/javascript.js') }}"></script>

</x-app-layout>
