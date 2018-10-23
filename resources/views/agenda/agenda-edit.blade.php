@extends('shared.base')
@section('content')
@if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif 
        <div class="row">
            <div class="">
                    <form action="{{route ('agenda.update', $contato->id )}}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}      
                            <input type="hidden" name="_method" value="PUT">
                                                 
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name" value="{{ $contato->name }}">
                              </div>
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $contato->email }}">
                          </div>
                          <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone"  placeholder="Enter Telefone" value="{{ $contato->telefone }}">
                          </div>  
                          <div class="form-group">
                                <label for="data_nascimento">Data Nascimento</label>
                                <input type="text" class="form-control" id="data_nascimento" name="data_nascimento"  placeholder="Y-m-d" value="{{ $contato->data_nascimento }}">
                          </div>   
                          <div class="form-group">                            
                                <input type="hidden" class="form-control" id="user_id" name="user_id"  value="{{ $contato->user_id }}">
                          </div>                          
                    </div>
                    <div class="modal-footer">
                     <a href="{{ url()->previous() }}" class="btn btn-info">Voltar</a>
                      <button type="submit" class="btn btn-warning">Save changes</button>  
                    </form>
            </div>
        </div>
            
        <script>
                $('#ok').fadeIn().delay(3000).fadeOut(function () {
                    $(this).remove()
                });
        </script>
@endsection