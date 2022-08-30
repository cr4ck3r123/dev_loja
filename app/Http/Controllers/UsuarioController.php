<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
         //   dd($credential);
                 
            
            if(Auth::attempt($credential)){ //Se as credenciais forem validas 
               //dd("Logou");               
               return redirect()->route('home');
            }else{ //Se não for valida 
              //  dd("Não logou");
                $request->session()->flash("err", "Login ou Senha invalido");
                return redirect()->route('logar');
            }
            
        }
        return view("logar", $data);
    }
    
    
    //Metodo logout
      public function logout(){
       Auth::logout();
     return redirect()->route('home');
   }
   
    
}
