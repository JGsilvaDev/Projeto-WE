<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editando</title>
</head>
<body>

    <form method="POST">
        @method('PUT')
        @csrf

        <label>ID:</label>
        <input id="id" type="text" value="{{$id}}" disabled>

        <label>Nome Produto:</label>
        <input id="nome" type="text" value="{{ $sentenca[0]->NOME_PRODUTO }}">
        <label>Descrição:</label>
        <textarea id="desc" name="desc" id="desc" cols="30" rows="10">{{ $sentenca[0]->DESCRICAO }}</textarea>

        <button type="submit">SALVAR</button>
    </form>

    
</body>
</html>