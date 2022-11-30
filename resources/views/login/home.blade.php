<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="\css\grid.css">
    <link rel="stylesheet" type="text/css" href="\css\style.css">
    <link rel="stylesheet" type="text/css" href="\css\login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Fonts -->

</head>

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

<body style="margin:0px;padding:0px;overflow:hidden">
    <div id="grade">
        <div id="header" class="fundo-preto" onclick="mudarIframe();">
            <a href="/">
                <img src="./img/logo.svg" alt="" id="logo">
            </a>

            <ul id="botoes-produto">
                <li id="produto_1" style="color:white" onclick="mudarIframe(event)">REGISTRAR |</li> 
                <li id="produto_2" style="color:white" onclick="mudarIframe(event)">CALENDARIO |</li> 
                <li id="produto_3" style="color:white" onclick="mudarIframe(event)">PACOTES |</li> 
                <li id="produto_4"><a href="/login" style="color:white">LOGOUT</a></li>
            </ul>
        </div>
    </div>

    <iframe src="/calendario" id="calendario" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:55px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>
    <iframe src="/pacotes" id="pacotes" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:55px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>
    <iframe src="/register" id="register" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:55px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>


    {{-- LIBRAS --}}
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
</body>

</html>

<script>

    $('#pacotes').hide();
    $('#register').hide();

    // LIBRAS 
    new window.VLibras.Widget('https://vlibras.gov.br/app');

    $('#servicos-button-end').on('click', function() {
        window.location.href = '/config_pacote';
    });

    function mudarIframe(event){
       // $('li').click(function(event) { 
            var confirm = event.target.id;

            console.log(event.target.id);
            switch(confirm) {
                case "produto_1":
                    $('#register').fadeIn('fast');
                    $('#calendario').fadeOut('fast');
                    $('#pacote').fadeOut('fast');
                    break;
                case "produto_2":
                    $('#pacotes').fadeOut('fast');
                    $('#register').fadeOut('fast');
                    $('#calendario').fadeIn('fast');
                    break;
                case "produto_3":
                    $('#calendario').fadeOut('fast');
                    $('#register').fadeOut('fast');
                    $('#pacotes').fadeIn('fast');
                    break;
            }
            // if(event.target.id == 'produto_1'){
            //     $('#editPerfil').modal('show');

            // }else if(event.target.id == 'produto_2'){
            //     $('#pacotes').fadeOut('fast');

            //     $('#calendario').fadeIn('fast');

            // }else if(event.target.id == 'produto_3'){
            //     $('#calendario').fadeOut('fast');

            //     $('#pacotes').fadeIn('fast');
                
            // }
        // })
    }
</script>
