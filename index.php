<?php
use Slim\Factory\AppFactory;
define("BASE_PATH", __DIR__);
require __DIR__ . '/vendor/autoload.php';

function autoload($className){
    $paths = ['/', '/controllers', '/models'];
    foreach ($paths as $path) {
        $file = __DIR__.$path."/$className.php";
        if(file_exists($file)){
            require_once($file);
            break;
        }
    } 
}
spl_autoload_register("autoload");

$app = AppFactory::create();

$app->get("/negozio", "NegozioController:negozio");

$app->get("/articoli", "NegozioController:articoli");
$app->get("/articoli/{id}", "NegozioController:id");

$app->get("/ordini", "NegozioController:ordini");
$app->get("/ordini/{numero_ordine}", "OrdineController:ordine");
$app->get("/ordini/{numero_ordine}/articoli_venduti", "OrdineController:articoli_venduti");
$app->get("/ordini/{numero_ordine}/articoli_venduti/{id}", "OrdineController:dettagli");

$app->get("/ordini/{numero_ordine}/verifica", "OrdineController:verifica");
$app->get("/ordini/{numero_ordine}/sconto", "NegozioController:sconto");

$app->run();
