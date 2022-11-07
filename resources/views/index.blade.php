<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We</title>



    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Fonts -->

</head>

<a href="login">Tela login</a>

<body>



    {{-- LIBRAS --}}
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>

    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    {{-- LIBRAS --}}



    {{-- CHATBOT --}}
    <script>
        var botmanWidget = {
            chatServer: '/botman',
            title: 'Weezinho',            
            introMessage: 'Olá, meu nome é Weezinho. Eu sou o assistente virtual da empresa. Estou aqui para te ajudar. Como posso te chamar?',   
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    {{-- CHATBOT --}}


</body>
</html>