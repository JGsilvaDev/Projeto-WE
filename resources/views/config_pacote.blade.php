<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="\css\config_pacote.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</head>

<body>
    <h3 id="pacote-titulo">Selecione os pacotes que deseja</h3>
    <div id="system">
        <div id="drag-wrap">
            @foreach ( $produtos as $prod )
                <div class="drag drag-item" ondragstart="drag(event)" draggable="true" value="{{$prod->ID}}">{{$prod->NOME_PRODUTO}}</div>
            @endforeach
        </div>
        <div id="drop-wrap" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        
    
       <div id="dvBtn">
            <button id="btnCalc" onclick=btnConfirm()><img src="\img\confirm.png" width=128 height=128></button>
       </div>
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
  
</body>
</html>

<script>//Script para Drag and Drop

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

    /*
    //Drag Events
    dragItems.forEach(item => {
        item.addEventListener('dragstart', dragStart);
    });

    //Drop Events
    dropBoxes.forEach(box =>{
        box.addEventListener('dragover', dragOver);
        box.addEventListener('drop', dropEvent);
        box.addEventListener('dragleave', dragLeave);
    });

    //seta o valor do texto ao arrastar
    function dragStart(e){
        e.dataTransfer.setData('text/plain', e.target.innerText);
    }
    //impede loop
    function dragOver(e){
        e.preventDefault();
    }
    //passa de uma div pra outra
    function dropEvent(e){
        e.preventDefault()
        this.className = "drag_item";
        
        const el = document.createElement('p');
        el.className = "drag";
        el.setAttribute('id', 'teste');
        const dataId = e.dataTransfer.getData('text');
        el.setAttribute('data-id', dataId);
        el.innerText =  e.dataTransfer.getData('text');

        this.appendChild(el);

        const es = document.querySelector("[id='teste']");
        console.log(dataId);
        selecionados.push(dataId)
        

    }
    //seta uma classe pra div
    function dragLeave(e){
        e.preventDefault()

        this.className = "drag_item";
    }

    */
   function btnConfirm(event){
        texto = selecionados
       $('#produtos').val(texto);
       $('#visualizar').modal('show');
   }
   
   function limparCampos(){
       $('#produtos').val('');
       $('#nome').val('');
       $('#email').val('');
   }
</script>