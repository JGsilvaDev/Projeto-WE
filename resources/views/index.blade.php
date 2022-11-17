<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We</title>
    
    <link rel="stylesheet" type="text/css" href="\css\grid.css">
    <link rel="stylesheet" type="text/css" href="\css\style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
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
        <div id="header" class="fundo-cinza">
            <img src="./img/logo.svg" alt="" id="logo">
            <ul id="botoes-produto">
                <li id="produto_1" class="header-option">Produtos</li> |
                <li id="produto_2" class="header-option">Produtos</li> |
                <li id="produto_3" class="header-option">Produtos</li> |
                <li id="produto_4" class="header-option">Produtos</li>
            </ul>
        </div>
        <div id="descricao-seg">
            <h1 id="desc-titulo" class="txt-titulo">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
            <p id="desc-texto" class="txt-desc"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore maxime iure numquam saepe ea ipsam omnis vero quasi adipisci esse animi, perspiciatis fugiat! Non, expedita. Aliquam pariatur ad alias iure?</p>
            <button id="orcamento-button">Faça seu orçamento</button>
        </div>
        <div id="servicos" class="fundo-cinza">
            <p id="service-titulo" class="txt-titulo">NOSSOS SERVIÇOS</p>
            <p id="service-desc" class="txt-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio iusto, architecto saepe laborum cumque aspernatur ad delectus, eos facilis hic quia, laudantium consectetur veritatis temporibus?</p>

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
            <button id="servicos-button-end">MONTE SEU PACOTE</button>
        </div>
        
        <div id="sobre" class="fundo-preto">
            <img src="./img/olhos.png" alt="" id="sobre-imagem">
            <div id="sobre-intro">
                <p id="sobre-titulo" class="txt-titulo">SOBRE A WE</p>
                <p id="sobre-desc" class="txt-desc">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt, recusandae nobis, eaque doloribus cum nulla tempore praesentium qui, labore nisi sapiente repellendus ipsa reiciendis! Voluptatem maiores beatae quisquam! Asperiores recusandae porro nihil hic, magni iusto voluptate ea in excepturi officiis veritatis neque voluptas eligendi reiciendis fugiat aspernatur ratione, natus maiores!
                </p>
            </div>

            <div id="detalhe-excelencia" classe="detalhe">
                <img src="./img/Vector_V.svg" alt="" id="detalhe-ex-img" class="detalhe-imagem">
                <p id="detalhe-ex-titulo" class="detalhe-titulo">EXCELÊNCIA E QUALIDADE</p>
                <p id="detalhe-ex-desc" class="detalhe-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fermentum est ut elit gravida convallis.</p>
            </div>
            <div id="detalhe-integridade" classe="detalhe">
                <img src="./img/Vector_Aperto.svg" alt="" id="detalhe-int-img" class="detalhe-imagem">
                <p id="detalhe-int-titulo" class="detalhe-titulo">EXCELÊNCIA E QUALIDADE</p>
                <p id="detalhe-int-desc" class="detalhe-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fermentum est ut elit gravida convallis.</p>
            </div>
        </div>

        <div id="projeto">
            <div id="projeto-titulo" class="txt-titulo">Bora começar um projeto juntos?</div>
            <div id="projeto-desc" class="txt-desc">Seu projeto merece ficar em boas mãos e nós, da We, temos o que é preciso para entregar a melhor versão do seu sonho! Está preparado? Então bora começar!
            <button id="projeto-button">COMEÇAR UM PROJETO</button>
            </div>
        </div>

        <div id="contato" class="fundo-cinza">
            <img src="./img/logo.svg" alt="" id="contato-logo">
            <ul id="nav-lista">
                <p id="nav-lista-titulo">CONTINUE NAVEGANDO</p>
                <li id="nav-lista_1">SERVIÇOS</li> 
                <li id="nav-lista_2">SOBRE</li> 
                <li id="nav-lista_3">CONTATO</li> 
                <li id="nav-lista_4">ORÇAMENTO</li>
            </ul>
            <ul id="contato-lista">
                <p id="contato-lista-titulo">CONTINUE NAVEGANDO</p>
                <li id="contato-lista_1">SERVIÇOS</li> 
                <li id="contato-lista_2">SOBRE</li> 
                <li id="contato-lista_3">CONTATO</li> 
                <li id="contato-lista_4">ORÇAMENTO</li>
            </ul>
        </div>

        <div id="rodape">We. 2022 - Todos os direitos reservados</div>
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

{{-- LIBRAS --}}
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>