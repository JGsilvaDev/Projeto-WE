<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Portal do Beneficiario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="\css\login.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>

    <div class="container container-recsenha" id="container_index" style="width: 35%">
        <form method="post">
            @csrf
            <div class="imgcontainer">
                <img id="unimedLogo" src="./img/logo_preta.svg" alt="img" class="img">
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
                <form method="POST" id="login">
                    @csrf
                    @method('PUT')

                    <input type="number" value="{{ $id }}" style="display: none">

                    <label for="senha"><b>Senha:</b></label>
                    <input id="senha" type="password" placeholder="*************" name="senha" minlength="8" required>
                    <span id="olhoAberto3" onclick="mostrarOcultarSenha3()"><ion-icon name="eye-outline"></ion-icon></span>
                    <span id="olhoFechado3" onclick="mostrarOcultarSenha3()"><ion-icon name="eye-off-outline"></ion-icon></span>

                    <label for="senha"><b>Confirmação de Senha:</b></label>
                    <input id="confirmSenha" type="password" placeholder="***********" name="confirmSenha" minlength="8" required>
                    <span id="olhoAberto4" onclick="mostrarOcultarSenha4()"><ion-icon name="eye-outline"></ion-icon></span>
                    <span id="olhoFechado4" onclick="mostrarOcultarSenha4()"><ion-icon name="eye-off-outline"></ion-icon></span>

                    <button id="acessar" class="acessar-button" type="submit">Acessar</button>

                </form>
            </div>
        </form>
    </div>
</body>

<script>

    var password = document.getElementById("senha");
    var confirm_password = document.getElementById("confirmSenha");

    function validarSenha(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Senhas diferentes!");
      } else {
        confirm_password.setCustomValidity('');
      }
    } 

    password.onchange = validarSenha;
    confirm_password.onkeyup = validarSenha;

    $('#olhoAberto3').hide();
    $('#olhoAberto4').hide();

    function mostrarOcultarSenha3(){
        var senha = document.getElementById('senha');

        if(senha.type ==  "password"){
            senha.type = 'text';
            $('#olhoFechado3').hide();
            $('#olhoAberto3').show();
        }else{
            senha.type = 'password';
            $('#olhoAberto3').hide();
            $('#olhoFechado3').show();
        }
    }

    function mostrarOcultarSenha4(){
        var senha = document.getElementById('confirmSenha');

        if(senha.type ==  "password"){
            senha.type = 'text';
            $('#olhoFechado4').hide();
            $('#olhoAberto4').show();
        }else{
            senha.type = 'password';
            $('#olhoAberto4').hide();
            $('#olhoFechado4').show();
        }
    }
</script>

