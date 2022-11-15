<!DOCTYPE html>
<html lang="pt-br">

<style>

.dashbord-title-container{
    margin-bottom: 30px;
    margin-top: 30px;
}

.dashbord-events-container th{
    width: 25%;
}

</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

<div class="container theme-showcase" role="main" style="padding-top: 50px;">

    <div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><div id="btnTab1" data-toggle="tab">Pacotes Fixos</div></li>
            <li><div id="btnTab2" data-toggle="tab" style="margin-left: 30px">Pacotes Personalizados</div></li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="tab1">

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="col-md-10 offset-md-1 dashbord-title-container">
                            <h1>Pacotes Fixos</h1>
                        </div>
                    </div>

                    <div class="panel-body" id="conteudo">

                        <div class="col-md-10 offset-md-1 dashbord-events-container">
                        
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Descrição</th>
                                            <th scope="col">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($personalizados as $pers )
                                            <tr id="{{ $pers->ID }}">
                                                <td>{{ $pers->ID }}</td>
                                                <td>{{ $pers->NOME_PRODUTO }}</td>
                                                <td>{{ $pers->DESCRICAO }}</td>
                                                <td><button type="submit" href="edit" onclick="edit(event)">Editar </button>
                                                    <button href="#"> Deletar</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>

                            <form method="POST">
                                <input id="value" name="value" style="display: none" type="text">
                                <input id="ident" name="ident" style="display: none" type="text" value="tab1">
                                <button id="btnEditar" type="submit" style="display: none">Editar </button>
                            </form>
                    </div>
                </div>
            </div>   

                <div class="tab-pane active" id="tab2">
                    <div class="col-md-10 offset-md-1 dashbord-title-container">
                            <h1>Produtos Personalizados</h1>
                    </div>
    
                    <div class="col-md-10 offset-md-1 dashbord-events-container">
                    
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produtos as $prod )
                                        <tr id="{{ $prod->ID }}">
                                            <td>{{ $prod->ID }}</td>
                                            <td>{{ $prod->NOME_PRODUTO }}</td>
                                            <td>{{ $prod->DESCRICAO }}</td>
                                            <td><button type="submit" href="edit" onclick="edit(event);teste()">Editar </button>
                                                <button href="#"> Deletar</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
    
                        <form method="POST">
                            <input id="value" name="value" style="display: none" type="text">
                            <input id="ident" name="ident" style="display: none" type="text" value="tab2">
                            <button id="btnEditar" type="submit" style="display: none">Editar </button>
                        </form>
                </div>

            </div>
        </div> 
    </div>
</div> 
</body>
</html>

<script>

    function edit(event){

        var id =  event.target.parentElement.parentElement.id;
        var teste = $('#ident').val();

        alert(teste);

        $('#value').val(id);

        //document.getElementById('btnEditar').click();

    }


    $('#tab2').hide();

    $('#btnTab1').on('click', function(){
        $('#tab1').fadeIn("fast");
        $('#tab2').fadeOut("fast");
    });

    $('#btnTab2').on('click', function(){
        $('#tab1').fadeOut("fast");
        $('#tab2').fadeIn("fast");
    });

</script>