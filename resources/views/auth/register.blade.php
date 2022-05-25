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

<!-- INICIO DA BARRA ------------------------------------------------------->
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('/img/DIGIATAS_ICONE.png') }}" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('admin.funcionarios')" :active="request()->routeIs('admin.funcionarios')">
                        {{ __('Funcionários') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::guard('admin')->user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('admin.logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::guard('admin')->user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::guard('admin')->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('admin.logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Sair') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<!--  FIM DA BARRA --------------------------------------------------------->


<!-- PAG BEGIN -------------------------------------------------------------->

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <div class="row" style="margin-bottom:40px;">
                    <div class="form-group">
                        <span id="FAKEH1">Cadastrar Funcionário</span>
                    </div>
                </div>
                <x-slot name="logo">
                </x-slot>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <!--- Dados Pessoais ---------->
                            <h1 style="font-size:20px;"><b>Dados Pessoais</b></h1>
                            <hr style="margin-bottom:20px;">

                            <div class="form-group">
                                <!-- Name -->
                                <x-label for="name" :value="__('Nome')" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                <!-- Email Address -->
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>

                            <div class="form-group">
                                <!-- CPF Address -->
                                <x-label for="cpf" :value="__('CPF')" />
                                <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required />
                                <!-- Matricula Address -->
                                <x-label for="matricula" :value="__('Matrícula')" />
                                <x-input id="matricula" class="block mt-1 w-full" type="text" name="matricula" :value="old('matricula')" required />
                                <!-- Telefone Address -->
                                <x-label for="telefone" :value="__('Telefone')" />
                                <x-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" required />
                            </div>


                            <div class="form-group">
                                <x-label for="setor" :value="__('Setor')" />
                                <!-- Select-->


                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            
                                             <hr>
                                                           <select name="setor" id="setor" class="form control input-sm">
                                                 @foreach($setorList as $setor)
                                                    <option value="{{$setor->nome}}">{{$setor->nome}}</option>
                                                 @endforeach
                                             </select>
                                        </div>
                            </div>
                            </div>


                        </div>

                        <div>
                            <!--- Endereço ---------->
                            <h1 style="margin-top:30px;font-size:20px;"><b>Endereço</b></h1>
                            <hr style="margin-bottom:20px;">

                            <div class="row">
                                <div class="form-group">
                                    <!-- Cidade Address -->
                                    <x-label for="cep" :value="__('CEP')" />
                                    <x-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required />

                                    <!-- Cidade Address -->
                                    <x-label for="cidade" :value="__('Cidade')" />
                                    <x-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')" required />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <!-- Bairro Address -->
                                    <x-label for="bairro" :value="__('Bairro')" />
                                    <x-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')" required />
                                    <!-- Rua Address -->
                                    <x-label for="rua" :value="__('Rua')" />
                                    <x-input id="rua" class="block mt-1 w-full" type="text" name="rua" :value="old('rua')" required />
                                    <!-- Numero Address -->
                                    <x-label for="numero" :value="__('Numero')" />
                                    <x-input id="numero" class="block mt-1 w-full" type="text" name="numero" :value="old('numero')" required />
                                </div>
                            </div>
                        </div>




                        <div>
                            <!--- Senha ---------->
                            <h1 style="margin-top:30px;font-size:20px;"><b>Senha</b></h1>
                            <hr style="margin-bottom:20px;">

                            <div class="form-group">
                                <!-- Password -->
                                <x-label for="password" :value="__('Senha')" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                <!-- Confirm Password -->
                                <x-label for="password_confirmation" :value="__('Confirmar Senha')" />
                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                            </div>
                        </div>


                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Cadastrar') }}
                            </x-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>