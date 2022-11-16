<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</head>

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .drag_container,
    .drop_container{
        display: flex;
        justify-content: center;
        background-color: #eee;
        padding: 30px 100px;
    }

    .drop_item,
    .drag_item{
        width: 100px;
        height: 100px;
        border-radius: 5px;
        background-color:#fff;
        margin-right: 20px;
        padding: 10px;
    }

    .drop_container{
        margin-top: 200px;
    }

    .drag{
        font-size: 36px;
        font-weight: bold;
        width: 100%;
        height: 100%;
        background-color: goldenrod;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
    }

    .invisible{
        display: none;
    }

    #dvBtn{
        text-align: center;
        margin: 10px;
    }

    
</style>

<body>
    <div class="drag_container">
        @foreach ( $produtos as $prod )
            <div class="drag_item"><p id="{{ $prod->ID }}"></p><p class="drag" draggable="true" value="{{$prod->ID}}">{{$prod->NOME_PRODUTO}}</p></div>
        @endforeach
    </div>

    <div class="drop_container">
        @foreach (  $produtos as $prod )
                <div class="drop_item"></div>
        @endforeach
    </div>
    

   <div id="dvBtn" style="display: none">
        <button id="btnCalc" onclick=btnConfirm()>Confirmar</button>
   </div>

   <div>
    <form method="POST">
        @csrf
        <label>Informe seu email:</label>
        <input type="email" name="email" id="email">

        <label>Nome:</label>
        <input type="text" name="nome" id="nome">

        <input type="text" name="produtos" id="produtos">

        <button type="submit" onclick="confirmar();">Enviar</button>
    </form>
   </div>

   
</body>
</html>

<script>//Script para Drag and Drop

    $('#produtos').hide();

    var texto = ' '
    var selecionados = [] //array com os produtos que o clique selecionar

    const dragItems = document.querySelectorAll('.drag');
    const dropBoxes = document.querySelectorAll('.drop_item');

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
        texto += dataId + ' , '

    }
    //seta uma classe pra div
    function dragLeave(e){
        e.preventDefault()

        this.className = "drag_item";
    }

    function btnConfirm(event){
        $('#produtos').val(texto);
    
    }  
    
    function confirmar(){
        document.getElementById('btnCalc').click();
    }

</script>