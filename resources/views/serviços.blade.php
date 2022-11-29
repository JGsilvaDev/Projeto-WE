<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="\css\modal.css">
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
                <li id="produto_4"><a href="/" class="header-option" style="color: #fff">PACOTES</a></li>
            </ul>
        </div>
        
        <div id="servicos" class="fundo-cinza">
            <p id="service-titulo" class="txt-titulo">NOSSOS SERVIÇOS</p>
            <p id="service-desc" class="txt-desc">Fique por dentro do que a agência We pode fazer para que você tenha mais impressões, leads, conversões e venda para seu negócio por meio de nossos serviços de marketing digital.</p>

            <div class="button-box" id="button-box-1">
                <img src="./img/Vector_alvo.svg" id="svg-alvo" class="button-img"></img>
                <p id="button-titulo" class="btn-titulo">Marketing Digital</p>
                <p id="button-desc" class="btn-desc"> Planejamentos e ações de marketing digital para sua marca conquistar clientes.</p>
            </div>
            <div class="button-box" id="button-box-2">
                <img src="./img/Vector_aquarela.svg" id="svg-aquarela" class="button-img"></img>
                <p id="button-titulo" class="btn-titulo">Identidade Visual</p>
                <p id="button-desc" class="btn-desc"> Criação de identidade visual, manual, conceito da marca, logo e demais materiais auxiliares de gestão da marca.</p>
            </div>
            <div class="button-box" id="button-box-3">
                <img src="./img/Vector_megafone.svg" id="svg-megafone" class="button-img"></img>
                <p id="button-titulo" class="btn-titulo">Marketing Publicitário</p>
                <p id="button-desc" class="btn-desc"> Confecção de materiais desenvolvidos como flyers, folders, outdoors e proximidade da marca com o cliente.</p>
            </div>
        </div>

        <p id="service-titulo" class="txt-titulo fundo-preto" style="color: #fff"><b>PACOTES</b></p>

        <div id="servicos-banco" class="fundo-preto" >
            @foreach ( $produtos as  $prod)
                
                <div class="button-box-banco" id="button-box-banco-1">
                    <p id="button-titulo-banco" class="btn-titulo-banco" data-id="{{ $prod->NOME_PRODUTO }}" data-confirm="{{ $prod->ID }}" style="font-size: 24px;text-align:left;">{{ $prod->NOME_PRODUTO }}</p>
                    <p id="button-desc-banco" class="btn-desc-banco" style="font-size: 16px;text-align:left; display:none;"> {{ $prod->DESCRICAO }}</p>
                    <button id="btnTeste" onclick="modalClick(event);" style="display:none">Fale Conosco</button>
                </div>
            
            @endforeach
        </div>

        <div id="contato-input-page" class="fundo-cinza">
            <div id="service-desc-wrap">

                <p id="service-titulo-wrap" class="txt-titulo" style="color: #018390"><b id="service-titulo">MONTE SEU PACOTE PERSONALIZADO</b></p>
                <div id="input-block">
                    
                    <div id="input-block-campos">
                        <p id="service-desc">
                            Não encontra o pacote desejado em nosso site? Isso tem solução. No pacote personalizado você poderá escolher seus serviços de acordo com a sua necessidade. Achou mesmo que a We iria te decepcionar? Veja dicas para montar seu pacote personalizado.</p>
                        <button id="pacote_personalizado" style="width: 55%; font-size: 18px"><b>MONTE SEU  PACOTE ESPECIAL</b></button>
                    </div>    
            </div>

                <div id="redes-sociais-contato">
                    <img src="\img\caixas.png" width="400" height="400">
                    <!-- <p>AQUI VAI UMA IMAGEM</p> -->
                </div>
            </div>
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

        <div class="modal fade" data-backdrop="static" id="visualizar" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        <label>Informe seu email:</label>
                        <input type="email" name="email" id="email"><br>
                
                        <label>Nome:</label>
                        <input type="text" name="nome" id="nome"><br>
                
                        <label>Produtos:</label>
                        <input type="text" name="produtos" id="produtos" style="display: none"><br>

                        <input type="text" name="produtosHiden" id="produtosHiden" disabled><br>
                
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <div id="rodape">We. 2022 - Todos os direitos reservados</div>

    
   
{{-- LIBRAS --}}
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>

<script src="\js\nightmode.js"></script>
</body>
</html>


<script>
    // LIBRAS 
    new window.VLibras.Widget('https://vlibras.gov.br/app');
    var animationLocked = false
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms))
    }

    $(document).ready(function() {

        var divHeight = $(".button-box-banco").height();
        var debounce = null
        //a
        $(".button-box-banco").mouseenter(function(event){
                clearTimeout(debounce )

                var desc = event.target.children[1]
                var btn = event.target.children[2]
                debounce = setTimeout(function(event) {
                    if(desc) {
                    desc.style.display = 'block'
                    btn.style.display = 'block'
                    }
                },100)
                // await sleep(300)
                // var id = conteudo.getAttribute("data-confirm");
                // console.log(conteudo)
                // if(id == 2 || id == 5){
                //     $(this).animate({
                //         height: "190"
                //     });
                // }else if(id == 6){
                //     $(this).animate({
                //         height: "240"
                //     });

                // }else if(id == 7){
                //     $(this).animate({
                //         height: "200"
                //     });

                // }else{
                //     $(this).animate({
                //         height: "220"
                //     });
                // }
            // }
        }).mouseleave(function(event){
            var desc = event.target.children[1]
            var btn = event.target.children[2]
                // $(this).animate({
                //     height: "70"
                // });
            if(desc) {
                desc.style.display = 'none'
                btn.style.display = 'none'
            }
        });
      
    });

    $('#servicos-button-end').on('click', function(){
        window.location.href = '/config_pacote';
    });

    function confirmar(){
        document.getElementById('btnCalc').click();
    }

    function modalClick(event){
        var conteudo = event.target.parentElement.children[0];

        $('#produtos').val(conteudo.getAttribute("data-id"));
        $('#produtosHiden').val(conteudo.getAttribute("data-id"));

        $('#visualizar').modal('show');
    }

</script>
