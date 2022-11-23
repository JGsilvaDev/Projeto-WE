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
    <link rel="stylesheet" href="\css\login.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </head>
  <body>

    <div class="container" id="container_index">
        <form method="post">
        @csrf
            

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
          <div id="register-wrap">
            <div class="imgcontainer">
              <img id="welogo" src="./img/logo_preta.svg" alt="img" class="img">
            </div>
            <div class="container" id="emailSenha">
                <form method="POST">

                    <label for="name" style="color: black"><b>Nome:</b></label>
                    <input type="text" placeholder="Informe seu nome" name="name" required>

                    <label for="email" style="color: black"><b>Email:</b></label>
                    <input id="inputEmail" type="email" placeholder="E-mail" name="email" required>
        
                    <label for="senha" style="color: black"><b>Senha:</b></label>
                    <input id="inputSenha" type="password" placeholder="***********" name="senha" minlength="8" required>
                    <span id="olhoAberto1" onclick="mostrarOcultarSenha()"><ion-icon name="eye-outline"></ion-icon></span>
                    <span id="olhoFechado1" onclick="mostrarOcultarSenha()"><ion-icon name="eye-off-outline"></ion-icon></span>

                    <label for="confirmSenha" style="color: black"><b>Confirmação de senha:</b></label>
                    <input id="inputConfirmaSenha" type="password" placeholder="***********" name="confirmSenha" minlength="8" required>
                    <span id="olhoAberto2" onclick="mostrarOcultarSenha2()"><ion-icon name="eye-outline"></ion-icon></span>
                    <span id="olhoFechado2" onclick="mostrarOcultarSenha2()"><ion-icon name="eye-off-outline"></ion-icon></span>

                    <button id="acessar" type="submit">Registrar</button>
                </form>
            </div>
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

    $('#olhoAberto1').hide();
    $('#olhoAberto2').hide();

    function mostrarOcultarSenha(){
        var senha = document.getElementById('inputSenha');

        if(senha.type ==  "password"){
            senha.type = 'text';
            $('#olhoFechado1').hide();
            $('#olhoAberto1').show();
        }else{
            senha.type = 'password';
            $('#olhoAberto1').hide();
            $('#olhoFechado1').show();
        }
    }

    function mostrarOcultarSenha2(){
        var senha = document.getElementById('inputConfirmaSenha');

        if(senha.type ==  "password"){
            senha.type = 'text';
            $('#olhoFechado2').hide();
            $('#olhoAberto2').show();
        }else{
            senha.type = 'password';
            $('#olhoAberto2').hide();
            $('#olhoFechado2').show();
        }
    }

</script>