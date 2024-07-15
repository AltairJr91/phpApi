<?php

 require_once __DIR__ . "/vendor/autoload.php";
 require_once __DIR__ . "/src/routes/Main.php";   

use App\Http\Routes;
use App\Core\Core;

 Core::dispatch(Routes::routes());   