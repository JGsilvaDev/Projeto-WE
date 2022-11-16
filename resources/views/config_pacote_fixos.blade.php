<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

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
        @foreach ( $produtosFixos as $prodF )
            <div class="drag_item"><p id="{{ $prodF->ID }}"></p><p class="drag" draggable="false" value="{{$prodF->ID}}">{{$prodF->NOME_PRODUTO}}</p></div>
        @endforeach
    </div>
    

   {{-- <div id="dvBtn">
        <button id="btnCalc" onclick=btnConfirm()>Confirmar</button>
   </div> --}}

   <div class="modal fade" data-backdrop="static" id="visualizar" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confrime suas informações</h5>
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

    function btnConfirm(event){
        $('#produtos').val(texto);
    
    }  
    
    function confirmar(){
        document.getElementById('btnCalc').click();
    }

    $('.drag_item').on('click',function(event){
        
        getElementById('')
    });

</script>