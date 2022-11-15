<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;

use App\Models\Produtos;
use App\Models\Events;
use App\Mail\SendMailUser;
use App\Http\Controllers\BotManController;
<<<<<<< HEAD
=======

>>>>>>> parent of 46c4509 (Merge branch 'main' of https://github.com/JGaSilva/ProjetoWE)

Route::get('/', function () {
    return view('index');
});

Route::match(['get', 'post'], 'botman', [BotManController::class, "handle"]);

Route::get('/config_pacote', function () {

    $produtos = Produtos::all();
    
    return view('config_pacote',[
        'produtos' => $produtos,
    ]);
});

Route::post('/config_pacote', function (Request $request) {

    $opcao = 0;

    $email = request('email');
    $nome = request('nome');
    $produtos = request('produtos');

    $data = array(
        'nome' => $nome,
        'produtos' => $produtos,
        'opcao' => $opcao
    );

    Mail::to($email)
        ->send(new SendMailUser($data));

    return redirect('/');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

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

    $opcao = 1;

    $request->validate([
        'nome' => 'required',
        'email' => 'required|email',
        'mensagem' => 'required'
    ]);

    $data = array (
        'nome' => $request->nome,
        'email' => $request->email,
        'mensagem' => $request->mensagem,
        'opcao' => $opcao

    );

    Mail::to($request->email)
        ->send( new SendMailUser($data) );

    return back()
            ->with('success', 'Obrigado por nos contactar');
});

Route::get('/calendario', function(){
    return view('fullcalendar.calendario');
<<<<<<< HEAD
=======
});

Route::get('/pacotes', function(){

    $produtos = Produtos::all();

    $personzlizados = produtos_fixos::all();

    return view('pacotes',[
        'produtos' => $produtos,
        'personalizados' => $personzlizados,
    ]);
});

/*Route::post('/cadastrarPacote', function(Request $request){

    $cadastrar = new produtos;
    
    $cadastrar->produto = $request->produto;
    $cadastrar->descricao = $request->descricao;

    $cadastrar-> save();

    return view('cadastrarPacote',[
        'produtos' => $produtos,
    ]);
});*/

Route::get('/edit', function(Request $request){

    $id = $request->value;
    $ident = $request->ident;

    dd($ident);

    if( $ident == 'tab2'){
        $sentença = DB::table('produtos')
            ->select('NOME_PRODUTO','DESCRICAO')
            ->where('ID','=', $id)
            ->get();          

        return view('edit',[
            'id' => $id,
            'sentenca' =>  $sentença,
        ]);

    }elseif( $ident == 'tab1'){
        $sentença = DB::table('produtos_fixos')
            ->select('NOME_PRODUTO','DESCRICAO')
            ->where('ID','=', $id)
            ->get();          

        return view('edit',[
            'id' => $id,
            'sentenca' =>  $sentença,
        ]);
    }
    
});

Route::put('/edit', function(Request $request){

    produtos::findOrFail($request->id)->update(array("NOME_PRODUTO" => $request->nome, "DESCRIÇÃO" =>$request->desc));

    return redirect('/cadastrarPacote');
>>>>>>> parent of 46c4509 (Merge branch 'main' of https://github.com/JGaSilva/ProjetoWE)
});