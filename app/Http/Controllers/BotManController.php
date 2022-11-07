<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{

    public function handle()
    {
        $botman=app("botman");
        $botman->hears("{message}", function($botman, $message)
        {
                $this->askName($botman);
        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask("Qual o seu nome?", function(Answer $answer)
        {
            $name=$answer->getText();
            $this->say("Prazer em te conhecer ".$name.", como posso te ajudar?");
        });
        
    }
}