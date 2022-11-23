<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="\css\grid.css">
    <link rel="stylesheet" type="text/css" href="\css\style.css">
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

<body>
    <div id="grade">
        <div id="header" class="fundo-preto">
            <a href="/">
                <img src="./img/logo.svg" alt="" id="logo">
            </a>
            
            <ul id="botoes-produto">
                <li id="produto_1"><a href="/sobre" class="header-option" style="color: #fff">SOBRE</a><span class="separador">|</span></li> 
                <li id="produto_2"><a href="/contato" class="header-option" style="color: #fff">CONTATOS</a><span class="separador">|</span></li> 
                <li id="produto_3"><a href="/serviços" class="header-option" style="color: #fff">SERVIÇOS</a><span class="separador">|</span></li> 
                <li id="produto_4"><a href="/" class="header-option" style="color: #fff">PACOTES</a></li>
            </ul>
        </div>
        
        <div id="servicos" class="fundo-cinza">
            <p id="service-titulo" class="txt-titulo">NOSSOS SERVIÇOS</p>
            <p id="service-desc" class="txt-desc">Fique por dentro do que a agência We pode fazer para que você tenha mais impressões, leads, conversões e venda para seu negócio por meio de nossos serviços de marketinkg digital.</p>

            <div class="button-box" id="button-box-1">
                <img src="./img/Vector_alvo.svg" id="button-img"></img>
                <p id="button-titulo" class="btn-titulo">Marketing Digital</p>
                <p id="button-desc" class="btn-desc"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea adipisci pariatur blanditiis tempora laudantium illo ab alias nostrum.</p>
            </div>
            <div class="button-box" id="button-box-2">
                <img src="./img/Vector_aquarela.svg" id="button-img"></img>
                <p id="button-titulo" class="btn-titulo">Identidade Visual</p>
                <p id="button-desc" class="btn-desc"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea adipisci pariatur blanditiis tempora laudantium illo ab alias nostrum.</p>
            </div>
            <div class="button-box" id="button-box-3">
                <img src="./img/Vector_megafone.svg" id="button-img"></img>
                <p id="button-titulo" class="btn-titulo">Marketing Publicitário</p>
                <p id="button-desc" class="btn-desc"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea adipisci pariatur blanditiis tempora laudantium illo ab alias nostrum.</p>
            </div>
        </div>

        <p id="service-titulo" class="txt-titulo fundo-preto" ><b>PACOTES</b></p>
        <div id="servicos-banco" class="fundo-preto" >
            @foreach ( $produtos as  $prod)
                
                <div class="button-box-banco" id="button-box-banco-1">
                    <p id="button-titulo" class="btn-titulo">{{ $prod->NOME_PRODUTO }}</p>
                    <p id="button-desc" class="btn-desc"> {{ $prod->DESCRICAO }}</p>
                </div>
            
            @endforeach
        </div>

        <div id="contato" class="fundo-cinza">
            <img src="./img/logo.svg" alt="" id="contato-logo">
            <ul id="nav-lista">
                <p id="nav-lista-titulo">CONTINUE NAVEGANDO</p>
                <li><a id="nav-lista_1" href="/serviços" class="header-option">SERVICOS</a></li> 
                <li><a id="nav-lista_2" href="/sobre" class="header-option">SOBRE</a></li> 
                <li><a id="nav-lista_3" href="/contato" class="header-option">CONTATO</a></li> 
                <li><a id="nav-lista_4" href="#" class="header-option">ORÇAMENTO</a></li>
            </ul>
            <ul id="contato-lista">
                <p id="contato-lista-titulo">CONTINUE NAVEGANDO</p>
                <li><a id="nav-lista_1" href="/serviços" class="header-option">SERVICOS</a></li> 
                <li><a id="nav-lista_2" href="/sobre" class="header-option">SOBRE</a></li> 
                <li><a id="nav-lista_3" href="/contato" class="header-option">CONTATO</a></li> 
                <li><a id="nav-lista_4" href="#" class="header-option">ORÇAMENTO</a></li>
            </ul>
        </div>
        

    
   
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
    // LIBRAS 
    new window.VLibras.Widget('https://vlibras.gov.br/app');

    $('#servicos-button-end').on('click', function(){
        window.location.href = '/config_pacote';
    });

</script>