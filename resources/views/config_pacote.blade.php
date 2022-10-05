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

    #btnCalc{
        

    }

    
</style>

<body>
   <div class="drag_container">
        <div class="drag_item"><p id="descript1"><box-icon name='info-circle'></box-icon></p><p class="drag" draggable="true" value="{{$produtos[0]->ID}}">{{$produtos[0]->NOME_PRODUTO}}</p></div>
        <div class="drag_item"><p id="descript2"><box-icon name='info-circle'></box-icon></p><p class="drag" draggable="true" value="{{$produtos[1]->ID}}">{{$produtos[1]->NOME_PRODUTO}}</p></div>
        <div class="drag_item"><p id="descript3"><box-icon name='info-circle'></box-icon></p><p class="drag" draggable="true" value="{{$produtos[2]->ID}}">{{$produtos[2]->NOME_PRODUTO}}</p></div>
        <div class="drag_item"><p id="descript4"><box-icon name='info-circle'></box-icon></p><p class="drag" draggable="true" value="{{$produtos[3]->ID}}">{{$produtos[3]->NOME_PRODUTO}}</p></div>
   </div>

    <div class="drop_container">
        <div class="drop_item"></div>
        <div class="drop_item"></div>
        <div class="drop_item"></div>
        <div class="drop_item"></div>
   </div>

   <div id="dvBtn">
        <button id="btnCalc" onclick=btnConfirm()>Confirmar</button>
   </div>

   <button onclick=reload()>Refrech</button>

   
</body>
</html>

<script>//Script para Drag and Drop
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

    function dragStart(e){
        e.dataTransfer.setData('text/plain', e.target.innerText);

        /*setTimeout(()=>{
            this.className = "invisible";
        }, 0);*/
    }

    function dragOver(e){
        e.preventDefault();
        
    }

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
        texto += dataId + ' '

    }

    function dragLeave(e){
        e.preventDefault()

        this.className = "drag_item";
    }
        function clicked(event) {

        }
    function reload(){
        location.reload();
    }

    function btnConfirm(event){

            Swal.fire({
                icon: 'info',
                title: texto,
                text: 'conteudo',
                showConfirmButton: true
            })
    
    }          

</script>

<script>//Script para Sweet Alert

    $("#descript1").click(function(){
        Swal.fire({
            icon: 'info',
            title: 'Descrição',
            text: '{{ $produtos[0]->DESCRIÇÃO }}',
            showConfirmButton: true
        })
    });

    $("#descript2").click(function(){
        Swal.fire({
            icon: 'info',
            title: 'Descrição',
            text: '{{ $produtos[1]->DESCRIÇÃO }}',
            showConfirmButton: true
        })
    });

    $("#descript3").click(function(){
        Swal.fire({
            icon: 'info',
            title: 'Descrição',
            text: '{{ $produtos[2]->DESCRIÇÃO }}',
            showConfirmButton: true
        })
    });

    $("#descript4").click(function(){
        Swal.fire({
            icon: 'info',
            title: 'Descrição',
            text: '{{ $produtos[3]->DESCRIÇÃO }}',
            showConfirmButton: true
        })
    });

</script>

