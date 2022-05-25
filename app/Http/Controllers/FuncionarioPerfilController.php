<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atas;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;



use Illuminate\Support\Facades\Auth;


class FuncionarioPerfilController extends Controller
{

    //private $objId;
    private $objUser;

    public function __construct()
    {
        $this->objAta=new Atas();
        $this->objUser=new User();

    }

    public function index(){

        $u=$this->objUser->find( Auth::user()->id );

        return view('funcionario.index', compact('u'));

    }



    public function edit($id)
    {

        //exibe o nome do proprio usuario autenticado
        $u=$this->objUser->find( Auth::user()->id );

        return view('funcionario.edit', compact('u'));
    }



    public function update(Request $request, $id)
    {
        $this->objUser->where(['id'=>$id])->update([

        'email'=>$request->email,
        'telefone'=>$request->telefone,
        'cidade'=>$request->cidade,
        'cep'=>$request->cep,
        'rua'=>$request->rua,
        'bairro'=>$request->bairro,
        'numero'=>$request->numero,

        ]);

        return Redirect::to('/dashboard/perfil');

    }


    public function show($id)
    {



    }



}
