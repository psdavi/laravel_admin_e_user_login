<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';





//ADMIN

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        // login route
        Route::get('login','AuthenticatedSessionController@create')->name('login');
        Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');
    });

        Route::middleware('admin')->group(function(){
            Route::get('dashboard','HomeController@index')->name('dashboard');
            Route::get('dashboard/funcionarios','FuncionariosController@index')->name('funcionarios');
            Route::get('dashboard/funcionarios/{id}','FuncionariosController@show')->name('funcionarios.show');

            //admin excluir usuario
            Route::get('dashboard/funcionarios/excluir/{id}','FuncionariosController@destroy')->name('funcionarios.excluir');

        });
        Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
});


//começando as telas
//dei  o nome da rota q eu quis
//middleware permite acessar a rota apenas se estiver logado

Route::get('dashboard/atas', 'AtasController@index')->middleware(['auth'])->name('atas');
Route::get('dashboard/atas/{id}', 'AtasController@show')->middleware(['auth'])->name('ver_ata');
Route::get('dashboard/atas/{id}/editar', 'AtasController@edit')->middleware(['auth'])->name('editar.ata');

//rota update/editar
Route::put('dashboard/atas/{id}', 'AtasController@update')->middleware(['auth'])->name('update.ata');


//ROTA DELETE DA ATA
Route::get('dashboard/atas/excluir/{id}', 'AtasController@destroy')->middleware(['auth'])->name('deletar.ata');



Route::get('atas/create','AtasController@create')->name('create');

//Route::post('usuarios/add', 'UsuariosController@add')->middleware('auth');

//Route::resource('dashboard/atas', 'AtasController')->middleware(['auth'])->name('atas');

Route::get('admin/dashboard/setor', 'Admin\SetorController@index')->name('setor');
Route::get('admin/dashboard/setor/cadastrar', 'Admin\SetorController@cadastrar')->name('setor.cadastrar');
Route::post('admin/dashboard/setor/cadastrar', 'Admin\SetorController@create')->name('setor.create');


Route::post('atas/store', 'AtasController@store')->name('storeata');

//Route::resource('dashboard/atas/', 'AtasController');

//Route::resource('dashboard/atas', AtasController::class);
//Route::resource('atas', AtasController::class);



Route::get('dashboard/perfil', 'FuncionarioPerfilController@index')->middleware(['auth'])->name('perfil');
Route::get('dashboard/perfil/{id}/editar', 'FuncionarioPerfilController@edit')->middleware(['auth'])->name('editar.perfil');
Route::put('dashboard/perfil/{id}', 'FuncionarioPerfilController@update')->middleware(['auth'])->name('update.perfil');





//Route::get('dashboard/funcionarios/{id}','FuncionariosController@show')->name('funcionarios.show');
