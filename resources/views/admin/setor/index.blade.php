<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">


<x-admin-layout>
    <!-- <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel do Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="height: 500px;">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="text-decoration: underline;">
                        {{ __('Lista de Setores') }}
                    </h1>

                    <a href="{{ url('admin/dashboard/setor/cadastrar/') }}" id="btn_setor"><i style="font-size:small;" class="fa fa-plus"></i> Novo Setor</a>
                    <table id="tabela_setor" style="margin-top: 50px;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($setores as $setor)
                            <tr>
                                <td style="width: 50px;">{{ $setor->id }}</td>
                                <td>{{ $setor->nome }}</td>
                                <td style="width: 150px;">
                                    <a href="{{ url('admin/dashboard/setor/editar/') }}"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ url('admin/dashboard/setor/excluir/') }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

