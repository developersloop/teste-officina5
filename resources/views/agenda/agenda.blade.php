@extends('shared.base')
@section('content')
@if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert" id="ok" >
                Contato cadastrado com sucesso!
            </div>        
            {{ Session::forget('success')}}
         @endif
         @if(Session::has('success_delete'))
         <div class="alert alert-success" role="alert" id="ok" >
             Deletado  com sucesso!
         </div>        
         {{ Session::forget('success_delete')}}
      @endif
      @if(Session::has('error_delete'))
      <div class="alert alert-success" role="alert" id="ok" >
          Error ao deletar contato!
      </div>        
      {{ Session::forget('error_delete')}}
   @endif
        @if(Session::has('dados'))
            <div class="alert alert-danger" role="alert" id="ok" >
                Este contato já esta cadastrado
            </div>        
            {{ Session::forget('dados')}}
       @endif
       @if(Session::has('alteir'))
       <div class="alert alert-success" role="alert" id="ok" >
           Alterado com sucesso
       </div>        
       {{ Session::forget('alteir')}}
   @endif
 @if(Session::has('ok'))
 <div class="alert alert-success" role="alert" id="ok" >
     Contato editado com sucesso!
 </div>        
 {{ Session::forget('ok')}}
@endif
@if(Session::has('dados_alter'))
<div class="alert alert-danger" role="alert" id="ok" >
   Não foi possivel editar este contato
</div>        
{{ Session::forget('dados_alter')}}
@endif
    <div class="panel panel-default">    
        <div class="panel-heading">Lista de Contatos</div>  
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="officina5 | officina5@officina5.com" name="buscar" id="filtrar-tabela">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" disabled>Filtrar</button>
                        </span>
                    </div>
                </div>
            </div>
        
        <div class="row">
            <div class="col-md-12">
                   
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Data Nascimento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>            
                    <tbody>       
                        @if (!empty($users))
                            @foreach ($users as $data )                                
                            <tr class="contatos">
                                <td class="info-nome">{{ $data->name }}</td>
                                <td class="info-email">{{ $data->email }}</td>
                                <td>{{ $data->telefone }}</td>
                                <td>{{ $data->data_nascimento }}</td>
                                <td>
                                    <div class="contain">
                                            <a href={{ route('agenda.edit',  $data->id) }}><i class="glyphicon glyphicon-pencil"></i></a>
                                             &nbsp;&nbsp;
                                            <form action="{{ route('agenda.remove', ['id' => $data->id]) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="form-group">
                                                        <button class="btn btn-link salva" type="submit">
                                                            <i class="glyphicon glyphicon-trash" style=" position:relative; padding-top:0px!important;"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                                &nbsp;&nbsp;
                                    <a href="{{ route('agenda.show',  $data->id) }}"><i class="glyphicon glyphicon-zoom-in"></i></a>
                                    </div>
                                </td>                                
                            </tr>                         
                            @endforeach
                            @else 
                            
                        @endif                                                                         
                    </tbody>
                </table> 
            </div> 
        </div>
        <div align="center" class="row">
            <a href="#"></a>
        </div>
    </div>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Adicionar</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('agenda.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name">
                          </div>
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone"  placeholder="Enter Telefone">
                      </div>  
                      <div class="form-group">
                            <label for="data_nascimento">Data Nascimento</label>
                            <input type="text" class="form-control" id="data_nascimento" name="data_nascimento"  placeholder="Y-m-d">
                      </div>   
                      <div class="form-group">                            
                            <input type="hidden" class="form-control" id="user_id" name="user_id"  value="{{ $id }}">
                      </div>                          
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-warning">Save changes</button>  
                </form>
                </div>
              </div>
            </div>
          </div>
        <script>
                $('#ok').fadeIn().delay(3000).fadeOut(function () {
                    $(this).remove()
                });
                // FILTRANDO A TABELA

                var campoFiltro = document.querySelector("#filtrar-tabela");

                    campoFiltro.addEventListener("input", function(){
                        var contatos = document.querySelectorAll(".contatos");

                        if (this.value.length > 0) {
                            for (var i = 0; i < contatos.length; i++) {
                                var contato = contatos[i];
                                var tdNome = contato.querySelector(".info-nome");
                                var tdEmail = contato.querySelector(".info-email");
                                var nome = tdNome.textContent;
                                var email = tdEmail.textContent;
                                var expressao = new RegExp(this.value, "i"); 

                                if (!expressao.test(nome)) {
                                    contato.classList.add("invisivel");
                                } else {
                                    contato.classList.remove("invisivel");
                                }

                                if (!expressao.test(email)) {
                                    contato.classList.add("invisivel");
                                    
                                } else {
                                    contato.classList.remove("invisivel");
                                    
                                }
                            }
                        } else {
                            for (var i = 0; i < contatos.length; i++) {
                                var contato = contatos[i];
                                contato.classList.remove("invisivel");
                            }
                        }
                    });
        </script>
@endsection