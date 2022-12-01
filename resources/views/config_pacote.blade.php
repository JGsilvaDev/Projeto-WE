<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="\css\config_pacote.css">
    <link rel="stylesheet" type="text/css" href="\css\style.css">
    <link rel="stylesheet" type="text/css" href="\css\grid.css">
    <link rel="stylesheet" type="text/css" href="\css\modal.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</head>

<body>
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
    <div id="personalizado-header">
        <h1>PACOTES PERSONALIZADOS</h1>
    </div>
    <p class="txt-desc" id="config-pacote-descricao">Agora você poderá escolher os serviços que melhor atenderem suas necessidades. Após a confirmação, receberemos um chamado e nossa equipe analisará as opções desejadas ofertando as melhores condições e prazos para a realização do serviço. Após a escolha, é só aguardar que instantes a equipe da We entrará em contato.
</p>
    <div id="system">
        <div id="drag-wrap">
            @foreach ( $produtos as $prod )
                <div class="drag drag-item" ondragstart="drag(event)" draggable="true" value="{{$prod->ID}}">{{$prod->NOME_PRODUTO}}</div>
            @endforeach
        </div>
        <div id="drop-wrap" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    </div>
    <div id="dvBtn">
         <button id="btnCalc" onclick=btnConfirm()>CONFIRMAR PEDIDO</button>
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


    <div class="modal fade" data-backdrop="static" id="visualizar" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crie seu evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="limparCampos()">&times;</span>
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
                        <input type="text" name="produtos" id="produtos"><br>
                
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" data-backdrop="static" id="instrucoes" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Para utilizar, siga as instruções:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>- Deve-se clicar no pacote escolhido e manter pressionado arrastando para o lado direito</p>
                    <p>- Após o procedimento você encontrara o pacote escolhido separado dos que ainda não escolheu</p>
                    <p>- Pode realizar esse processo quantas vezes necessário</p>
                    <p>- Caso tenha escolhido o pacote errado, consegue reverter dando um click nele, assim ele sairá das suas opções</p>
                </div>
            </div>
        </div>
    </div>
    <div id="rodape">We. 2022 - Todos os direitos reservados</div>
    <script src="\js\nightmode.js"></script>
</body>
</html>

<script>

    // $(document).ready(function() {
    //     $('#instrucoes').modal('show');
    // })

    //Script para Drag and Drop

    var texto = ' '
    var selecionados = [] //array com os produtos que o clique selecionar

    const dragItems = document.querySelectorAll('.drag');
    const dropBoxes = document.querySelectorAll('.drop_item');
    const dropParent = document.getElementById('drop-wrap')
    const dragParent = document.getElementById('drag-wrap')
    dragging = undefined //variável que armazena div arrastada
    function allowDrop(ev) {
        ev.preventDefault();
    }
    
    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
        dragging = ev.target //passa o target pra variavel
    }

    function drop(ev) {
        dropParent.append(dragging); //passa a variavel pra outra div
        dropParent.lastChild.setAttribute('onclick','SendBack(event)')
        selecionados.push(dragging.innerHTML)
        // texto += dragging.innerHTML + ' | '
    }
    
    function SendBack(event) {
        var index = selecionados.indexOf(event.target.innerHTML) //procura pelo índice do selecionado
        selecionados.splice(index,1) //remove o elemento do índice

        dragParent.append(event.target)
    }

    function AddElement(name, ammount) {
        for (i=0;i<ammount;i++) {
            var div = document.createElement('div')
            div.innerHTML = name
            div.setAttribute('draggable','true')
            div.setAttribute('ondragstart','drag(event)')
            div.setAttribute('class','drag-item')
            dragParent.append(div)
        }
    }

   function btnConfirm(event){
        if(selecionados == ![]) {
            Swal.fire({
                icon: 'error',
                title: 'Nenhum elemento selecionado',
                text: 'Por favor, selecione algum pacote para confirmar'
            })
        } else {
            texto = selecionados
            
           $('#produtos').val(texto);
           $('#visualizar').modal('show');
        }
   }
   
   function limparCampos(){
       $('#produtos').val('');
       $('#nome').val('');
       $('#email').val('');
   }
</script>