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
                <li id="modo_escuro_button" onclick="nmSwitch()"><img src="./img/Vector_nightmode.svg" alt=""></li>
                <li id="produto_1"><a href="/sobre" class="header-option" style="color: #fff">SOBRE</a><span class="separador">|</span></li> 
                <li id="produto_2"><a href="/contato" class="header-option" style="color: #fff">CONTATOS</a><span class="separador">|</span></li> 
                <li id="produto_3"><a href="/serviços" class="header-option" style="color: #fff">SERVIÇOS</a><span class="separador">|</span></li> 
                <li id="produto_4"><a href="/config_pacote" class="header-option" style="color: #fff">PACOTES PERSONALIZADOS</a></li>
            </ul>
        </div>
        
        <div id="descricao-seg">
            <h1 id="desc-titulo" class="txt-titulo" style="margin-top:32px; font-weight:bold;">Eleve seu negócio a outro nível e aumente a visibilidade com a estratégia certa. </h1>
            <p id="desc-texto" class="txt-desc"> Nós da We Consultoria & Marketing Digital temos o conhecimento e competência no mercado para elevar o seu negócio e triplicar o seu faturamento!</p>
            <button id="orcamento-button" style="margin-bottom: 64px;" onclick="redirect('/serviços')">Faça seu orçamento</button>
        </div>
        <div id="servicos" class="fundo-cinza">
            <p id="service-titulo" class="txt-titulo" style="text-align: center;">NOSSOS SERVIÇOS</p>
            <p id="service-desc" class="txt-desc" style="text-align: center;">Trabalhamos com uma linha de criação e estratégia adaptada para o perfil de cada cliente, respeitando a história e personalidade da marca.</p>

            <div class="button-box" id="button-box-1">
                <img src="./img/Vector_alvo.svg" id="svg-alvo" class="button-img"></img>
                <p id="button-titulo" class="btn-titulo">Marketing Digital</p>
                <p id="button-desc" class="btn-desc"> Planejamentos e ações de marketing digital para sua marca conquistar clientes. </p>
            </div>
            <div class="button-box" id="button-box-2">
                <img src="./img/Vector_aquarela.svg" id="svg-aquarela" class="button-img"></img>
                <p id="button-titulo" class="btn-titulo">Identidade Visual</p>
                <p id="button-desc" class="btn-desc"> Criação de identidade visual, manual, conceito da marca, logo e demais materiais auxiliares de gestão da marca. </p>
            </div>
            <div class="button-box" id="button-box-3">
                <img src="./img/Vector_megafone.svg" id="svg-megafone" class="button-img"></img>
                <p id="button-titulo" class="btn-titulo">Marketing Publicitário</p>
                <p id="button-desc" class="btn-desc"> Confecção de materiais desenvolvidos como flyers, folders, outdoors e proximidade da marca com o cliente.</p>
            </div>
            <button id="servicos-button-end">MONTE SEU PACOTE</button>
        </div>
        
        <div id="sobre" class="fundo-preto">
            <img src="./img/olhos.png" alt="" id="sobre-imagem">
            <div id="sobre-intro">
                <p id="sobre-titulo" class="txt-titulo">SOBRE A WE.</p>
                <p id="sobre-desc" class="txt-desc">
                    Somos uma agência de consultoria e marketing digital que trabalha a favor do desenvolvimento e a inserção de micro e pequenas empresas no mundo digital. Trabalhamos com soluções e estratégias para conectar sua marca com o consumidor de forma humanizada, proporcionando novas oportunidades de negócio e potencializando suas vendas. Nossos serviços de consultoria e mentoria vai muito além de dar algumas dicas pontuais. Nós formamos uma parceria firmada com sua empresa, para ajudar o seu negócio a se comprometer com uma série de ajustes e mudanças que farão seus lucros crescerem.
                </p>
            </div>

            <div id="detalhe-excelencia" classe="detalhe">
                <img src="./img/Vector_V.svg" alt="" id="detalhe-ex-img" class="detalhe-imagem">
                <p id="detalhe-ex-titulo" class="detalhe-titulo">EXCELÊNCIA E QUALIDADE</p>
                <p id="detalhe-ex-desc" class="detalhe-desc">Uma equipe completa, preparada e capacitada para potencializar o seu negócio.</p>
            </div>
            <div id="detalhe-integridade" classe="detalhe">
                <img src="./img/Vector_Aperto_branco.svg" alt="" id="detalhe-int-img" class="detalhe-imagem">
                <p id="detalhe-int-titulo" class="detalhe-titulo">EXCELÊNCIA E QUALIDADE</p>
                <p id="detalhe-int-desc" class="detalhe-desc">Somos parceiros de projetos, nosso objetivo só é alcançado depois do seu.</p>
            </div>
        </div>

        <div id="projeto">
            <div id="projeto-titulo" class="txt-titulo">Bora começar um projeto juntos?</div>
            <div id="projeto-desc" class="txt-desc">Seu projeto merece ficar em boas mãos e nós, da We, temos o que é preciso para entregar a melhor versão do seu sonho! Está preparado? Então bora começar!
            <button id="projeto-button" onClick="redirect('/serviços')">COMEÇAR UM PROJETO</button>
            <script>
                //você não viu nada aqui. shhhhhh
                function redirect(page) {window.location.href = page;}
            </script>
            <!--<button id="projeto-button"><a id="text-button" href="/serviços">COMEÇAR UM PROJETO</a></button>-->
            </div>
        </div>

        <div id="contato" class="fundo-cinza">
            <img src="./img/logo.svg" alt="" id="contato-logo">
            <ul id="nav-lista">
                <p id="nav-lista-titulo">CONTINUE NAVEGANDO</p>
                <li><a id="nav-lista_1" href="#" class="header-option">SERVICOS</a></li> 
                <li><a id="nav-lista_2" href="/sobre" class="header-option">SOBRE</a></li> 
                <li><a id="nav-lista_3" href="/contato" class="header-option">CONTATO</a></li> 
                <li><a id="nav-lista_4" href="#" class="header-option">ORÇAMENTO</a></li>
            </ul>
            <ul id="contato-lista">
                <p id="contato-lista-titulo">CONTINUE NAVEGANDO</p>
                <li><a id="nav-lista_1" href="#" class="header-option">SERVICOS</a></li> 
                <li><a id="nav-lista_2" href="/sobre" class="header-option">SOBRE</a></li> 
                <li><a id="nav-lista_3" href="/contato" class="header-option">CONTATO</a></li> 
                <li><a id="nav-lista_4" href="#" class="header-option">ORÇAMENTO</a></li>
            </ul>
        </div>
        
        <!--CONTAINER DO COOKIE-->
        <link rel="stylesheet" href="\css\cookies.css">
            <div id="cookies-container">
                <p id="cookies-titulo">Controle sua privacidade</p>
                <p id="cookies-descricao">Nosso site utiliza <strong>cookies</strong> para melhorar sua experiência. Ao utilizar nossos serviços, você concorda com tal monitoramento.</p>

                <button id="recusar" class="cookie-botao" onclick="Recusar()">recusar</button>
                <button id="aceitar" class="cookie-botao" onclick="Aceitar()">aceitar</button>
            </div>
        <script src="\js\cookies.js"></script>

        <!--CONTAINER DO CHATBOT-->
        <div id="container">
            <img src="img\mensagem.png" width="64" height="64" onclick="hideshow()" id="icon-show">
            <p id="bot-titulo" onclick="hideshow()" width=400>Wezinho</p>
            <iframe id="bot-frame" src="\chatbot" frameborder="0" width=400 height=500></iframe>
        </div>
        <script src="\js\main.js"></script>

        <div id="rodape">We. 2022 - Todos os direitos reservados</div>
    </div>


    
    <script src="\js\nightmode.js"></script>
   
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
