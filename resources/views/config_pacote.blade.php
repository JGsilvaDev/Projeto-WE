<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<style>
    .container-soltar {
        padding: 10px;
        width: 400px;
        min-height: 100px;
        background-color: blue;
    }

    .elementos-arrastaveis{
        background-color: black;
        width: 250px;
        min-height: 100px;
    }

    [draggable="true"]{
        padding: 13px;
        width: 100px;
        margin-bottom: 10px;
        background-color: red;
    }

    .houver{
        background-color: lightblue;
    }

    
</style>

<body>
    <div class="elementos-arrastaveis">
        <div draggable="true">
            Pacote 1
        </div>

        <div draggable="true">
            Pacote 2
        </div>

        <div draggable="true">
            Pacote 3
        </div>

        <div draggable="true">
            Pacote 4
        </div>

        <div draggable="true">
            Pacote 5
        </div>

    </div>

    <div class="container-soltar">

    </div>

    <script>

        const palavras = document.querySelectorAll("[draggable='true']");
        const containerSoltar = document.querySelector(".container-soltar");
        const elementosArrastaveis = document.querySelector(".elementos-arrastaveis");

        function comecarArrastar(){
           this.classList.add("arrastando");
        }

        function entrouSoltar(){

            this.classList.add("houver");

            const elementoArrastado = document.querySelector(".arrastando");

            this.appendChild(elementoArrastado);
        }

        function entrouSoltar2(){

            this.classList.add("houver");

            const elementoArrastado2 = document.querySelector(".arrastando");

            this.appendChild(elementoArrastado2);

        }

        function saiuSoltar(){
            this.classList.remove("houver");
        }

        function saiuSoltar2(){
            this.classList.remove("houver");
        }

        palavras.forEach((palavra) => {
            palavra.addEventListener("dragstart", comecarArrastar);
        })

        containerSoltar.addEventListener("dragover", entrouSoltar);
        containerSoltar.addEventListener("dragleave", saiuSoltar);

        elementosArrastaveis.addEventListener("dragover", entrouSoltar2);
        elementosArrastaveis.addEventListener("dragleave", saiuSoltar2);

    </script>
</body>

</html>
