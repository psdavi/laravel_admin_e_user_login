<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atas;
use App\Models\User;

class FuncionariosController extends Controller
{

    private $objId;
    private $objUser;

    public function __construct()
    {
        $this->objAta=new Atas();
        $this->objUser=new User();

    }

    public function index(){

       //  dd($usuario);

        $usuario=$this->objUser->all();
        //dd($usuario);

        return view('admin.funcionarios.index', compact('usuario'));

    }


    public function show($id)
    {


        $u=$this->objUser->find($id);

        return view('admin.funcionarios.show', compact('u'));
    }



    public function destroy($id) {
        $del=$this->objUser->destroy($id);
        return($del)?"sim":"não";
    }



}
