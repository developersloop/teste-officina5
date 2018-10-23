<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function index(){
        $usuarios =  DB::table('users')->get();
        return view('welcome-login',compact('usuarios'));
    }

    public function entrar(Request $req){
        
        $dados = $req->all();
        if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['senha']])){
          $users = DB::table('users')->where('email', $dados["email"])->first();
          Session::put('users', $users->id);
          Session::put('name_user', $users->name);
            return redirect()->route('agenda.home');
        } else {
             return redirect()->route('login');
        }
    }

    public function sair()
    {
        Auth::logout();
        Session::forget('success');
        Session::forget('alteir');
        return redirect()->route('login');
    }
}
