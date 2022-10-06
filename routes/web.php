<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use App\Models\Produtos;
<<<<<<< HEAD
use App\Mail\SendMailUser;
=======
use App\Http\Controllers\BotManController;
>>>>>>> 31af23a1f1bce0847722ff79cc9414767c25a1dd

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

    $email = request('email');
    $nome = request('nome');
    $produtos = request('produtos');

    $data = array(
        'nome' => $nome,
        'produtos' => $produtos,
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


