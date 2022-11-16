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

    $email = request('email');
    $nome = request('nome');
    $produtos = request('produtos');

    $data = array(
        'nome' => $nome,
        'produtos' => $produtos
    );

    Mail::to($email)
        ->send(new SendMailUser($data));

    return redirect('/');
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

Route::get('/edit', function(Request $request){

    $id = $request->value;
    $ident = $request->ident;

    if( $ident == 'tab2'){

        $sentença = DB::table('produtos')
            ->select('NOME_PRODUTO','DESCRICAO')
            ->where('ID','=', $id)
            ->get();  

        return view('edit',[
            'id' => $id,
            'sentenca' =>  $sentença,
            'ident' => $ident,
        ]);

    }elseif( $ident == 'tab1'){

        $sentença = DB::table('produtos_fixos')
            ->select('NOME_PRODUTO','DESCRICAO')
            ->where('ID','=', $id)
            ->get(); 

        return view('edit',[
            'id' => $id,
            'sentenca' =>  $sentença,
            'ident' => $ident,
        ]);
    }
    
});

Route::put('/edit', function(Request $request){

    if($request->ident == 'tab2'){
        produtos::findOrFail($request->id)->update(array("NOME_PRODUTO" => $request->nome, "DESCRIÇÃO" =>$request->desc));
        return redirect('/pacotes')->with('success', 'Produto editado com sucesso');
    }else if($request->iden == 'tab1'){
        DB::table('produtos_fixos')->where('ID','=', $request->id)->update(array("NOME_PRODUTO" => $request->nome, "DESCRIÇÃO" =>$request->desc));
        return redirect('/pacotes')->with('error', 'Produto editado com sucesso');
    }else{
        return redirect('/pacotes')->with('error', 'Erro ao editar o produto');
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
    Events::find($request->edit)->update($request->all());

    //dd($request->edit);
    //DB::table('events')->where('ID','=', $request->deletar)->update($request->all());
    return back()->with('success', 'Evento editado com sucesso');
});

Route::delete('/calendario', function(Request $request){
    Events::findOrFail($request->deletar)->delete();
    return back()->with('success', 'Evento deletado com sucesso');
});