<h1>Solicitação Seviço We</h1>

<p>Olá, {{ $data['nome'] }}! </p>

<p>Este é um email automático. Não é necessário responder.</p>

<p>Somos da We, e recentemente você montou seu pacote de serviços em nosso site. Este e-mail é para salientar que seu pedido já está em analise, e logo entraremos em contato com vocês!</p>

<p>Aproveitamos para lembrá-lo(a) que sua solicitação de serviço e eventual reunião com nossa equipe tem CUSTO ZERO!</p>

<p>Abaixo, está um resumo do seu pedido.</p>

@if ( $data['produtos'] )
    <p>{{ $data['produtos'] }}</p>
@endif


<p>Caso prefira, entre em contato com a gente!</p>

<p>Whatsapp (XX) XXXXX-XXXX<br>
<a href="http://127.0.0.1:8000">Site: www.wemarketingconsultoria.com.br</a><br>
E-mail weconsultoriamarketing@gmail.com<br>
Instagram @wejuntos<br>
Linked-ln XXXXXXX</p>