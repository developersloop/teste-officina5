<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Agenda;
use Validator;
class AgendaController extends Controller
{
    protected function validarUser  ($request){
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email"=> "required",
            "telefone" => "required",
            "data_nascimento"=>"required",
            "user_id"=>"required"
            
        ]);
        return $validator;
    }
    public function index(Request $request){
        if(session()->has('users'))
        {
            $users =DB::table('users')
            ->join('agendas', 'users.id', '=', 'agendas.user_id')
            ->where('agendas.user_id',session('users'))
            ->get();
            $id = session('users');
            return view('agenda/agenda',compact('users','id'));   
        } else {
            return view('agenda/agenda');
        }
    }

    public function show($id){
        $contatos = DB::table('agendas')->where('id',$id)->get();  
        return view('agenda/agenda-show', compact('contatos'));
    }
    public function edit($id){
      
        $contato = Agenda::find($id);        
        $id_user = $contato["id"];
 
        return view('agenda/agenda-edit', compact('contato','id_user'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validarUser($request);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
 
        $agenda = Agenda::find($id);
        //dd($id);
      
        if($agenda){ 
            $dados = $request->all();
            $agenda->update($dados);
            Session::put('ok', true);
            return redirect()->route('agenda.home');
           
        } else {
            Session::put('dados_alter', true);
            return redirect()->route('agenda.home');
        }
    }
    
    public function store(Request $request){
       $validator = $this->validarUser($request);
           if($validator->fails()){
               return redirect()->back()->withErrors($validator->errors());
           }
           $dados = $request->all();
           // verificando se existe email cadastrado e name
           $user = Agenda::where('email', $request->input('email'))
           ->where('name', $request->input('name'))
           ->where('user_id', $request->input('user_id'))
           ->count(); 
           if($user > 0){ 
               Session::put('dados', true);
               return redirect()->route('agenda.home');
           } else {               
               Agenda::create($dados);
               Session::put('success', true);
               return redirect()->route('agenda.home');
   
           }
    }

    public function destroy($id)
    {
        $agenda_delete = Agenda::find($id)->delete();
        if($agenda_delete){
            Session::put('success_delete', true);
            return redirect()->route('agenda.home');
        }  else {
            Session::put('error_delete', true);
            return redirect()->route('agenda.home');
        }
    }
    
  public function found(){
      return view('error/found');
  }
  public function foundfive(){
    return view('error/505');
 }
  
}
