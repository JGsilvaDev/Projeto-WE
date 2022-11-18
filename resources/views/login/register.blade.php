<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Portal do Beneficiario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container" id="container_index">
        <form method="post">
        @csrf
            <div class="imgcontainer">
                <img id="unimedLogo" src="./img/logo.svg" alt="img" class="img">
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="container" id="emailSenha">
                <form method="POST">

                    <label for="name" style="color: black"><b>Nome:</b></label>
                    <input type="text" placeholder="Informe seu nome" name="name" required>

                    <label for="email" style="color: black"><b>Email:</b></label>
                    <input id="inputEmail" type="email" placeholder="Coloque seu Email" name="email" required>
        
                    <label for="senha" style="color: black"><b>Senha:</b></label>
                    <input id="inputSenha" type="password" placeholder="***********" name="senha" minlength="8" required>

                    <label for="confirmSenha" style="color: black"><b>Confirmação de senha:</b></label>
                    <input id="inputConfirmaSenha" type="password" placeholder="***********" name="confirmSenha" minlength="8" required>

                    <button id="acessar" type="submit">Registrar</button>
                </form>
            </div>
        </form>
    </div>
    
  </body>
</html>

<script>
    var password = document.getElementById("inputSenha");
    var confirm_password = document.getElementById("inputConfirmaSenha");

    function validarSenha(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Senhas diferentes!");
      } else {
        confirm_password.setCustomValidity('');
      }
    } 

    password.onchange = validarSenha;
    confirm_password.onkeyup = validarSenha;

</script>