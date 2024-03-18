<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class OrdineController{
    public function ordine(Request $request, Response $response, $args){
        $params = isset($_GET['numero_ordine'])?$_GET:null;
        $numero_ordine = isset($args['numero_ordine'])?$args['numero_ordine']:$params['numero_ordine'];

        if (!is_numeric($numero_ordine)) {
            $error_message = "Il numero ordine inserito non ha formato valido!";
            $response->getBody()->write(json_encode($error_message, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json")->withStatus(404);
        }

        $negozio = new Negozio("MEDIAWORLD", "3334441234", "Via del Filarete", "https://www.mediaworld.it/", "12121212");
        $dati_ordine = $negozio->findByNumber($numero_ordine);
        if(is_null($dati_ordine)){
            $error_message = "Ordine non presente!";
            $response->getBody()->write(json_encode($error_message, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json")->withStatus(404);
        }
        else{
            $response->getBody()->write(json_encode($dati_ordine, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }
    }

    public function articoli_venduti(Request $request, Response $response, $args){
        $params = isset($_GET['numero_ordine'])?$_GET:null;
        $numero_ordine = isset($args['numero_ordine'])?$args['numero_ordine']:$params['numero_ordine'];

        if (!is_numeric($numero_ordine)) {
            $error_message = "Il numero ordine inserito non ha formato valido!";
            $response->getBody()->write(json_encode($error_message, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json")->withStatus(404);
        }

        $negozio = new Negozio("MEDIAWORLD", "3334441234", "Via del Filarete", "https://www.mediaworld.it/", "12121212");
        $dati_ordine = $negozio->findByNumber($numero_ordine);
        if(is_null($dati_ordine)){
            $error_message = "Ordine non presente, quindi non ci sono articoli venduti!";
            $response->getBody()->write(json_encode($error_message, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json")->withStatus(404);
        }
        else{
            $array_articoli_venduti = $dati_ordine->getArticoli_venduti();
            if(count($array_articoli_venduti) == 0){
                $error_message = "Attenzione, l'ordine esiste ma non ci sono articoli venduti!";
                $response->getBody()->write(json_encode($error_message, JSON_PRETTY_PRINT));
                return $response->withHeader("Content-Type", "application/json")->withStatus(404);
            }
            else{
                $response->getBody()->write(json_encode($dati_ordine, JSON_PRETTY_PRINT));
                return $response->withHeader("Content-Type", "application/json")->withStatus(200);
            }
            
        }
    }
}