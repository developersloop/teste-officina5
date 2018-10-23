<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agenda Contatos</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body { padding-top: 70px; }
            .contain{
                display: flex;
                flex-flow: row wrap;
            }
          
             .salva{
                 padding: 0 0 0 0 ;
             }
            .invisivel{
                display: none;
            }
            body#LoginForm{ background-image:url("http://prosperity1.com.br/wp-content/uploads/2017/07/agenda-2296195_960_720.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}

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

    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="container">
                        <div class="row">
                             <a class="navbar-brand" href="#">
                            @if(Session::has('name_user'))
                              Seja Bem Vindo!  <span style="color:red;">[{{ Session('name_user') }}]</span>                                     
                            @else
                              Agenda
                            @endif
    
                        </a>
                        <div id="navbar" class="navbar-collapse collapse d-flex" style="margin-left:1050px;">
                                <ul class="nav navbar-nav justify-content-end">
                                    @if(!Auth::guest())
                                     <li><a href="{{ route('sair.login') }}"><i class="glyphicon glyphicon-share"></i>&nbsp; Sair</a></li>
                                    @endif
                                </ul>
                            </div>
                      </div>
                 </div>

                       
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>