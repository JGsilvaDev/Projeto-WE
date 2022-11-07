<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Events;

header('Content-Type: application/json');

$teste = Events::all();

$events = json_encode($teste);

echo $events;

?>