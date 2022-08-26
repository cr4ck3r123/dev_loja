<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsuarioController extends Controller
{

    public function logar(Request $request){
        $data = [];
        
        if($request->isMethod("POST")){
            
//            $this->validate($request,[ 'login' => 'required', 'password' => 'required' ]);
            //Se entrar neste if é porque o usuario clicou no botão logar
            $login = $request->input("login");
            $senha = $request->input("password");
            
            $credential = ['email' => $login, 'password' =>  $senha];
       //dd($credential);
        //logar
            if(Auth::attempt($credential)){
                dd("Logou");
                return redirect()->route('home');
            }else{
                $request->session()->flash("err", "Usuario ou Senha invalido");
                       return redirect()->route('logar');
            }
        }
        return view("logar", $data);
    }
    
    
}
