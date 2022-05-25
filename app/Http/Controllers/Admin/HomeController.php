<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atas;
use App\Models\User;

class HomeController extends Controller {

    private $objId;
    private $objUser;

    public function __construct() {
        $this->objAta = new Atas();
        $this->objUser = new User();
    }

    public function index() {

        //  dd($usuario);

        $usuario = $this->objUser->all();
        //dd($usuario);

    
        return view(('admin.dashboard'), compact('usuario'));
    }

}


