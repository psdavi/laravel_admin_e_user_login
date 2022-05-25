<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atas;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class AtasController extends Controller
{

    private $objAta;
    private $objUser;

    public function __construct()
        {
            $this->objAta=new Atas();
            $this->objUser=new User();
            
        }
    
    public function index()
    {

      
    
        
    
            //dd($this->objUser);
          //  dd($this->objUser->all());
         // dd($this->objId->find(1)->relUsers);
    
    


         $ata=$this->objAta->all();
       //  dd($ata);

        return view('atas.index', compact('ata'));
    }

   
    public function create()
    {
        return view('atas.create');
    }

  
    public function store(Request $request)
    {

        //pega tudo do form de uma vez
        //tudo q tiver aqui tem q ir pro fillable
        //todos os campos do banco tem q ser fornecidos pelo form
        /*
        $ata = new Atas;
        $ata = $ata->create($request->all());
        */
    


        $ata = new Atas;
        
        $ata = $ata->create([
        'titulo'=>$request->titulo,
        'setor'=>$request->setor,
        'pauta'=>$request->pauta,
        'emissor'=>$request->emissor,
        'email'=>$request->email,
        'descricao'=>$request->descricao,
        'participantes'=>$request->participantes,
        'convidados'=>$request->convidados,
        'conteudo'=>$request->conteudo,

        ]);
/*
        dd($request);

        $objAta=new Atas();
        
        $this->$objAta->create([
        'titulo'=>$request->titulo,
        'setor'=>$request->setor,
        'pauta'=>$request->pauta

        ]);
*/
        return Redirect::to('/dashboard/atas');
    }

   
    public function show($id)
    {

      
        $ata=$this->objAta->find($id);

//esse codigo funciona sem precisar passar pela blade
//basta trocar a variavel user por ata
        //$ata = $ata->find($ata->id)->relUsers;
        

        return view('atas.show', compact('ata'));
    }

  
    public function edit($id)
    {
        $ata=$this->objAta->find($id);

        //exibe a lista de usuarios
        $usuario=$this->objUser->all();

        return view('atas.edit', compact('ata', 'usuario'));
    }


    
    public function update(Request $request, $id)
    {
        $this->objAta->where(['id'=>$id])->update([

        'titulo'=>$request->titulo,
        'setor'=>$request->setor,
        'pauta'=>$request->pauta,
        'emissor'=>$request->emissor,
        'email'=>$request->email,
        'descricao'=>$request->descricao,
        'participantes'=>$request->participantes,
        'convidados'=>$request->convidados,
        'conteudo'=>$request->conteudo,

        ]);

        return Redirect::to('/dashboard/atas');

    }

  
    public function destroy($id)
    {
        $del=$this->objAta->destroy($id);
        return($del)?"sim":"não";
    }
}
