@extends('shared.base')
@section('content')

        
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
                        @if (!empty($contatos))
                            @foreach ($contatos as $data )                                
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->telefone }}</td>
                                <td>{{ $data->data_nascimento }}</td>
                                <td> <a href="{{ url()->previous() }}" class="btn btn-link">
                                    <i class="glyphicon glyphicon-arrow-left
                                    "></i> Voltar</a></td>                                
                            </tr>                         
                            @endforeach
                        @endif                                                                         
                    </tbody>
                </table> 
            </div> 
        </div>
        <div align="center" class="row">
            <a href="#"></a>
        </div>
    </div>
   
@endsection