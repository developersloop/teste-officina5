
<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body#LoginForm{ background-image:url("http://i0.wp.com/leonardopalmeira.com.br/website/wp-content/uploads/2013/11/news_0191.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}
</style>
  </head>
<body id="LoginForm">
      <div class="container">
          @if($errors->any())
          <div class="alert alert-danger" role="alert">
              @foreach ($errors->all() as $error)
                  {{ $error }}<br>
              @endforeach
          </div>
          @endif
          @if(Session::has('success'))
          <div class="alert alert-success" role="alert" id="ok" >
              Cadastrado com sucesso
          </div>        
          {{ Session::forget('success')}}
      @endif

      @if(Session::has('alteir'))
          <div class="alert alert-success" role="alert" id="ok" >
              Alterado com sucesso
          </div>        
          {{ Session::forget('alteir')}}
      @endif
      @if(Session::has('dados'))
      <div class="alert alert-warning" role="alert" id="ok" >
          Este email já esta cadastrado
      </div>        
      {{ Session::forget('dados')}}
  @endif
       <h1 class="form-heading" style="margin-top:60px;"></h1>
       <div class="login-form">
      <div class="main-div">
          <div class="panel">
        <h2>Login</h2>
        <p>Entre com seu Email e Senha</p>
        </div>
          <form id="Login" action="{{ route('app.login.entrar') }}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" id="senha" name="senha" placeholder="Password">
              </div>
              <div class="forgot">
                 <a href="" data-toggle="modal" data-target="#modalAlteirSenha">Esqueceu a senha?</a>
                 <a href="" style="padding-left:70px;" 
                  data-toggle="modal" data-target="#exampleModalCenter">Cadastre-se</a>
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
          </form>
          </div>    
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastre-se</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('users.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
                  </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="senha">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-black" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-dark">Save changes</button>  
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal alterar senha -->
  <div class="modal fade" id="modalAlteirSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Alterar Senha</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="{{ route('users.atualizar') }}" method="POST">
                  {{ csrf_field() }}
                  @if(!empty($usuarios))
                  <div class="form-group">
                      <label for="exampleFormControlSelect1">Selecione seu Usuário</label>
                      <select class="form-control" id="mySelect">
                          <option value="">Selecione o usuario</option>
                          @foreach ($usuarios as  $users)
                            <option value="{{ $users->id }}">{{ $users->name }}</option>
                         @endforeach
                      </select>
                  </div>
                  @endif
                  <div class="form-group" id="inputOculto">
                      <label for="senha">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                      <input type="hidden" class="form-control" id="pass" name="pass" placeholder="Password">
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-black" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark">Save changes</button>
              </form>
          </div>
        </div>
      </div>
    </div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
 <script>
  $('#ok').fadeIn().delay(3000).fadeOut(function () {
    $(this).remove()
});
 
let users = <?= $usuarios ?>;
$(document).ready(function() {
  $('#inputOculto').hide();
  $('#mySelect').change(function() {
   for (let index = 0; index < users.length; index++) {
    if ($('#mySelect').value == users.id) {
      $('#inputOculto').show();
      let id_pass = document.querySelector("#pass");
      id_pass.value = this.value;
    } else {
      $('#inputOculto').hide();
    }
     
   }
  });
});
 </script>
</body>
</html>
