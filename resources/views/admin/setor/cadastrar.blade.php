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
                <div class="p-6 bg-white border-b border-gray-200" style="height: 210px;">

                    <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="text-decoration: underline;">
                        {{ __('Cadastrar Setor') }}
                    </h1>
                    <br>
                    <h1>Cadastrar</h1>
                    
                    <form action="{{ url('admin/dashboard/setor/cadastrar') }}" method="post">
                        <div class="row">
                            <div class="form-group">
                                <label>Nome do Setor</label>
                                <input type="text" name="nome" required>
                                <button type="submit">Cadastrar</button>
                                <!-- <a href="{{ url('admin/dashboard/setor/create/') }}">Cadastrar</a> -->
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</x-admin-layout>