<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;
use Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    protected function validarUser  ($request){
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email"=> "required",
            "password" => "required"
            
        ]);
        return $validator;
    }
   
  
    public function store(Request $request)
    {
        $validator = $this->validarUser($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $dados = $request->all();
        // verificando se existe email cadastrado
        $user = User::where('email', $request->input('email'))->count(); 
        if($user > 0){ 
            Session::put('dados', true);
            return redirect()->route('login');
        } else {
            $dados["password"] = Hash::make($request->password);
            User::create($dados);
            Session::put('success', true);
            return redirect()->route('login');

        }

 
    }

  
   
    public function atualizar(Request $request)
    {
        
         $id = $request["pass"];
         if(!empty($id)){
             $usuario = User::find($id);
             $dados = $request->all();
             $dados["password"] = Hash::make($request->password);
             $usuario->update($dados);
             Session::put('alteir', true);
             return redirect()->route('login');
         } else {
            return redirect()->back();
         }
    }

   
}
