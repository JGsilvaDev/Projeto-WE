@if ($data['opcao' ] == 0) 

<h1>BATMAN</h1>

<h1>PEDIDO REQUISITADO</h1>

<p>O usuário {{ $data['nome'] }} pediu o seguinte:</p>
<p>{{ $data['produtos'] }}</p>

@elseif ($data['opcao'] == 1)

<h1>ROBIN</h1>

<h1>CONTATO FEITO</h1>

<p>O usuário {{ $data['nome'] }} fez o seguinte contato:</p>
<p>{{ $data['mensagem'] }}</p>


@endif