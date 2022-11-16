<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;

use App\Models\Produtos;
use App\Models\produtos_fixos;
use App\Models\Events;
use App\Http\Controllers\BotManController;

use App\Mail\SendMailUser;
use App\Models\historico_contact;
use App\Mail\EnvioMail;
use App\Http\Controllers\ContactController;
use PharIo\Manifest\Email;
use Illuminate\Routing\UrlGenerator;


//ROTA INDEX

Route::get('/', function () {
    return view('index');
});

//ROTAS BOT

Route::match(['get', 'post'], 'botman', [BotManController::class, "handle"]);

//ROTAS PARA CONFIGURAR PACOTES

Route::get('/config_pacote', function () {

    $produtos = Produtos::all();
    
    return view('config_pacote',[
        'produtos' => $produtos,
    ]);
});

Route::post('/config_pacote', function (Request $request) {

    $email = $request->email;
    $nome = $request->nome;
    $produtos = $request->produtos;

    $data = array(
        'nome' => $nome,
        'produtos' => $produtos
    );

    Mail::to($email)
        ->send(new SendMailUser($data));

    return redirect('/')->with('success','Email enviado com sucesso');
});

Route::get('/config_pacote_fixo', function () {

    $produtosFixos = produtos_fixos::all();
    
    return view('config_pacote_fixos',[
        'produtosFixos' => $produtosFixos,
    ]);
});

Route::post('/config_pacote_fixo', function (Request $request) {

    $email = $request->email;
    $nome = $request->nome;
    $produtos = $request->produtos;

    $data = array(
        'nome' => $nome,
        'produtos' => $produtos
    );

    Mail::to($email)
        ->send(new SendMailUser($data));

    return redirect('/')->with('success','Email enviado com sucesso');
});

//ROTAS PARA LOGIN

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//ROTAS ENTRE EM CONTATO

Route::get('/contato', function () {
    return view('contact.index');
});

Route::post('/contato', function (Request $request) {

    $contato = new historico_contact;
    
    $contato->nome = $request->nome;
    $contato->email = $request->email;
    $contato->descricao = $request->mensagem;
    $contato->data_envio = date('Y-m-d');

    $contato -> save(); 

    $request->validate([
        'nome' => 'required',
        'email' => 'required|email',
        'mensagem' => 'required'
    ]);

    $data = array (
        'nome' => $request->nome,
        'email' => $request->email,
        'mensagem' => $request->mensagem
    );

    Mail::to($request->email)
        ->send( new SendMailUser($data) );


    return back()->with('success', 'Obrigado por nos contactar');

});

//ROTAS DOS PACOTES

Route::get('/pacotes', function(){

    $produtos = Produtos::all();

    $personzlizados = produtos_fixos::all();

    return view('pacotes',[
        'produtos' => $produtos,
        'personalizados' => $personzlizados,
    ]);
});

Route::post('/pacotes', function(Request $request){

    if($request->pacote == 'PP'){

        $pacoteF = new produtos_fixos();

        $pacoteF->NOME_PRODUTO = $request->nome;
        $pacoteF->DESCRICAO = $request->descPacote;
    
        $pacoteF->save();

    }else if($request->pacote == 'PS'){

        $pacote = new Produtos();

        $pacote->NOME_PRODUTO = $request->nome;
        $pacote->DESCRICAO = $request->descPacote;
    
        $pacote->save();
    }

    
    return back()->with('success','Evento criado com sucesso');

});

Route::put('/pacotes', function(Request $request){

    //dd($request->value);

    if($request->ident == "tab2"){

        //dd($request->nomeProd);

        DB::table('produtos')->where('id','=',$request->value )->update(['NOME_PRODUTO' => $request->nomeProd, 'DESCRICAO' => $request->descProd ]);

        return back()->with('success', 'Produto editado com sucesso');

    }else if($request->ident == "tab1"){

        DB::table('produtos_fixos')->where('id','=',$request->value )->update(['NOME_PRODUTO' => $request->nomeProd, 'DESCRICAO' => $request->descProd ]);

        return back()->with('success', 'Produto editado com sucesso');
    }else{

        return back()->with('error', 'Erro ao editar o produto');
    }
    
});
        
Route::delete('/pacotes', function(Request $request){

    $ident = $request->identDelete;

    if($ident == 'tab1' ){
        DB::table('produtos_fixos')->where('ID','=', $request->deletar)->delete();
        return back()->with('success', 'Produto deletado com sucesso');

    }else if($ident == 'tab2'){
        DB::table('produtos')->where('ID','=', $request->deletar)->delete();
        return back()->with('success', 'Produto deletado com sucesso');

    }else{
        return back()->with('error', 'Erro ao deletar o produto');
    }   
});



//ROTAS CALENDARIO

Route::get('/calendario', function(){

    $events = Events::all();
    
    return view('fullcalendar.calendario',[
        'events'=> $events
    ]);
});

Route::post('/calendario', function(Request $request){

    $formatStart = str_replace('/','-',$request->start);
    $transformStart =  strtotime($formatStart);
    $dateStart = date('Y-m-d h:i:s', $transformStart);
    $formatEnd = str_replace('/','-',$request->end);
    $transformEnd =  strtotime($formatEnd);
    $dateEnd = date('Y-m-d h:i:s', $transformEnd);

    $event = new Events;

    $event->title = $request->title;
    $event->start = $dateStart;
    $event->end = $dateEnd;
    $event->color =  $request->color;

    $event->save();

    return back()->with('success', 'Evento cadastrado com sucesso');
});

Route::put('/calendario', function(Request $request){

    $formatInicio = str_replace('/','-',$request->inicio);
    $transformInicio =  strtotime($formatInicio);
    $dateInicio = date('Y-m-d h:i:s', $transformInicio);

    $formatFim = str_replace('/','-',$request->fim);
    $transformFim =  strtotime($formatFim);
    $dateFim = date('Y-m-d h:i:s', $transformFim);

    $cal =  new Events;

    $cal->title = $request->titulo;
    $cal->start = $dateInicio;
    $cal->end = $dateFim;
    $cal = $cal->toArray();

    Events::findOrFail($request->edit)->update($cal);

    return back()->with('success', 'Evento editado com sucesso');
});

Route::delete('/calendario', function(Request $request){
    Events::findOrFail($request->deletar)->delete();
    return back()->with('success', 'Evento deletado com sucesso');
});