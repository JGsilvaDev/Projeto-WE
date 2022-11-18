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
                <form class="container" id="login">
                    <label for="email"><b>Email:</b></label>
                    <input id="inputEmail" type="email" placeholder="Coloque seu Email" name="email" required>

                    <label for="senha"><b>Senha:</b></label>
                    <input id="inputSenha" type="password" placeholder="***********" name="senha" required>
                    
                    <input type="text" style="display: none" name="option" value="login">
                    <div id="esqueciSenha">
                        <a id="linkEsqueciSenha" style="float:right">Esqueci minha senha</a>
                    </div>

                    <button id="acessar" type="submit">Acessar</button>

                    <h6 class="cadastro">Ainda não possui cadastro?<a href="register" id="link"> Clique aqui para
                            se cadastrar</a></h6>
                </form>
            </div>
        </form>
    </div>


</body>

    <form method='POST' >
        <input type="text" id="form_email" name="form_email">
        <input type="text" name="option" value="email">
        <button id="btn_email" type="submit"></button>
    </form>
</html>


<script>
    $('#linkEsqueciSenha').on('click', function() {
        Swal.fire({
            title: 'Alterar senha',
            text: 'Informe seu E-Mail: ',
            input: 'email',
            confirmButtonText: 'Enviar',
            showLoaderOnConfirm: true,
        }).then((event) => {
            $('#form_email').val(event.value)
            //document.getElementById('btn_email').click();
        })
    })
</script>
