<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller {

    public function __construct() {
        $this->setor = new Setor();
    }

    public function index() {

        $setores = $this->setor->all();
        return view('admin.setor.index', compact('setores'));
    }


    public function create(Request $request) {
        dd($request);


        $setor = new Setor;
        $setor->nome = $request->nome;
        $setor->save();
        return redirect('/admin/dashboard/setor');
    }

    public function cadastrar() {
        return view('admin.setor.cadastrar');
    }

    public function editar(Setor $setor) {
        //
    }

    public function excluir(Setor $setor) {
        //
    }
}
