<!DOCTYPE html>
<html lang="pt-br">

<style>
    .dashbord-title-container {
        margin-bottom: 30px;
        margin-top: 30px;
    }

    .dashbord-events-container th {
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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

    <div class="container theme-showcase" role="main" style="padding-top: 50px;">

        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active">
                    <div id="btnTab1" data-toggle="tab">Pacotes Fixos</div>
                </li>
                <li>
                    <div id="btnTab2" data-toggle="tab" style="margin-left: 30px">Pacotes Personalizados</div>
                </li>
                <li>
                    <button onclick="abrirModal()">+</button>
                </li>
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
                                        @foreach ($personalizados as $pers)
                                            <tr id="{{ $pers->ID }}">
                                                <td>{{ $pers->ID }}</td>
                                                <td id="{{ $pers->NOME_PRODUTO }}">{{ $pers->NOME_PRODUTO }}</td>
                                                <td id="{{ $pers->DESCRICAO }}">{{ $pers->DESCRICAO }}</td>
                                                <td><button type="submit" href="edit" onclick="edit(event)">Editar</button>
                                                    <button onclick="deletarEvento(event)"> Deletar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                                @foreach ($produtos as $prod)
                                    <tr id="{{ $prod->ID }}">
                                        <td>{{ $prod->ID }}</td>
                                        <td>{{ $prod->NOME_PRODUTO }}</td>
                                        <td>{{ $prod->DESCRICAO }}</td>
                                        <td><button onclick="edit(event)">Editar </button>
                                            <button onclick="deletarEvento(event)"> Deletar</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Form de delete --}}
                <form style="display: none" method="POST">
                    @csrf
                    @method('DELETE');
                    <input id="identDelete" name="identDelete" style="display: none" type="text" value="tab1">
                    <input id="deletar" name="deletar" type="number"><br>
                    <button id="btnDeletar" type="submit" style="margin-top: 30px">DELETAR</button>
                </form>

                {{-- Modal para criar novo produto --}}
                <div class="modal fade" data-backdrop="static" id="visualizar" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="exampleModalLabel">Criar evento Evento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <form method="POST">
                                    @csrf
                                    <label>Selecione qual tipo de pacote será criado:</label>
                                    <select name="pacote" id="pacote">
                                        <option value="PP">Pacote Padrão</option>
                                        <option value="PS">Pacote Personalizado</option>
                                    </select><br>

                                    <label>Nome do Pacote:</label>
                                    <input type="text" name="nome" id="nome" required><br>

                                    <label>Descrição do Pacote:</label>
                                    <textarea name="descPacote" id="descPacote" cols="40" rows="2"></textarea><br>

                                    <button type="submit">Salvar</button>
                                </form>
                        </div>
                    </div>
                </div>

                {{-- Modal para editar produto --}}
                <div class="modal fade" data-backdrop="static" id="editModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="exampleModalLabel">Editando Evento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST">
                                @method('PUT')
                                @csrf
                        
                                <input id="ident" name="ident" type="text" value="tab1" style="display: none">
                                <input id="value" name="value" type="text" style="display: none"><br>
                        
                                <label>Nome Produto:</label><br>
                                <input id="nomeProd" name="nomeProd" type="text"><br>

                                <label>Descrição:</label><br>
                                <textarea id="descProd" name="descProd" cols="30" rows="10"></textarea><br>
                        
                                <button type="submit">SALVAR</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
</body>

</html>

<script>
    function edit(event) {

        var id = event.target.parentElement.parentElement.id;
        var nome = event.target.parentElement.parentElement.children[1].id;
        var desc = event.target.parentElement.parentElement.children[2].id;

        $('#value').val(id);
        $('#nomeProd').val(nome);
        $('#descProd').val(desc);

        $('#editModal').modal('show');

    }


    $('#tab2').hide();

    $('#btnTab1').on('click', function() {
        $('#tab1').fadeIn("fast");
        $('#tab2').fadeOut("fast");

        $('#ident').val('tab1');
        $('#identDelete').val('tab1');

    });

    $('#btnTab2').on('click', function() {
        $('#tab1').fadeOut("fast");
        $('#tab2').fadeIn("fast");

        $('#ident').val('tab2');
        $('#identDelete').val('tab2');

    });

    function deletarEvento(event) {
        Swal.fire({
            title: 'Tem certeza que deseja deletar?',
            text: "Não tem como retornar o evento!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Deletar'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = event.target.parentElement.parentElement.id;

                var teste = $('#deletar').val(id);

                document.getElementById('btnDeletar').click();
            }
        })
    }

    function abrirModal(){
        $('#visualizar').modal('show');
    }
</script>
