<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
    <title>Contato</title>
    <title>Contato We.</title>


</head>

<body>
    <div id="grade">
        <div id="header" class="fundo-cinza">
            <a href="/">
                <img src="./img/logo.svg" alt="" id="logo">
            </a>
            
            <ul id="botoes-produto">
                <li id="produto_1"><a href="/sobre" class="header-option">SOBRE</a></li> |
                <li id="produto_2"><a href="/contato" class="header-option">CONTATOS</a></li> |
                <li id="produto_3"><a href="" class="header-option">SERVIÇOS</a></li> |
                <li id="produto_4"><a href="" class="header-option">PACOTES</a></li>
            </ul>
        </div>

        <div id="contato-titulo">
            <p class="txt-titulo" id="contato-titulo">CONTATO</p>
        </div>
        
        <div id="contato-desc-campo" class="fundo-cinza">
            <p class="txt-desc">
                Tem alguma dúvida sobre nossos serviços, procedimentos, solicitação de orçamento e/ou então assuntos<br>relacionados à empresa.
            </p>
        </div>

        <div id="contato-input-page" class="fundo-cinza">
            <div id="input-block">
            
                <div id="input-block-campos">
                    <form action="{{ url('/contato') }}"method="POST">
                        @csrf
    
                        <div class="form-group">
                            <h2>Envie o seu contato</h2>
                        </div>
    
                        @if(count($errors) > 0)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Preencha os dados corretamente!</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
    
                        @if($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Obrigado!</strong> {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
    
                        @if($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>OOOOOOOPPPSSS!</strong> {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
    
                        <div class="form-group">
                            <label for="nome" class="form-items">Nome</label>
                            <input name="nome" type="text" class="form-control" placeholder="Seu nome">
                        </div>
    
                        <div class="form-group">
                            <label for="email" class="form-items">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Seu E-Mail">
                        </div>
    
                        <div class="form-group">
                            <label for="mensagem" class="form-items">Mensagem</label>
                            <textarea name="mensagem" class="form-control" cols="10" rows="5" placeholder="Sua mensagem"></textarea>
                        </div>
            
                                <button type="submit" class="btn btn-primary" id="form-send">Enviar</button>
                            </form>
                        </div>
                    
    
                <div id="redes-sociais-contato">
                    <p>Redes Sociais</p>
                    <p>Facebook</p>
                    <p>Instagram</p>
                    <p>-------------------------------</p>
                    <p>Horários de funcionamento</p>
                    <p>Segunda a sexta: das 8h00 as 18h00</p>
                    <p>Sábados e domingos: das 9h00 as 13h00</p>
                </div>
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
    
        <div id="rodape">We. 2022 - Todos os direitos reservados</div>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>