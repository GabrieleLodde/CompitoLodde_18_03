<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class NegozioController{
    public function negozio(Request $request, Response $response, $args){
        $negozio = new Negozio("MEDIAWORLD", "3334441234", "Via del Filarete", "https://www.mediaworld.it/", "12121212");
        $response->getBody()->write(json_encode($negozio, JSON_PRETTY_PRINT));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }

    public function articoli(Request $request, Response $response, $args){
        $negozio = new Negozio("MEDIAWORLD", "3334441234", "Via del Filarete", "https://www.mediaworld.it/", "12121212");
        $arrayArticoli = $negozio->getArticoli();
        if(count($arrayArticoli) == 0){
            $message_error = "Attenzione, non ci sono articoli!";
            $response->getBody()->write(json_encode($message_error, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-type", "application/json")->withStatus(404);
        }
        else{
            $response->getBody()->write(json_encode($arrayArticoli, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-type", "application/json")->withStatus(200);
        }
    }

    public function id(Request $request, Response $response, $args){
        $params = isset($_GET['id'])?$_GET:null;
        $id = isset($args['id'])?$args['id']:$params['id'];

        if (!is_numeric($id)) {
            $error_message = "L'id inserito non ha formato valido!";
            $response->getBody()->write(json_encode($error_message, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json")->withStatus(404);
        }

        $negozio = new Negozio("MEDIAWORLD", "3334441234", "Via del Filarete", "https://www.mediaworld.it/", "12121212");
        $dati_articolo = $negozio->findByIndex($id);
        if(is_null($dati_articolo)){
            $error_message = "Articolo non presente!";
            $response->getBody()->write(json_encode($error_message, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json")->withStatus(404);
        }
        else{
            $response->getBody()->write(json_encode($dati_articolo, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }
    }

    public function ordini(Request $request, Response $response, $args){
        $negozio = new Negozio("MEDIAWORLD", "3334441234", "Via del Filarete", "https://www.mediaworld.it/", "12121212");
        $arrayOrdini = $negozio->getOrdini();
        if(count($arrayOrdini) == 0){
            $message_error = "Attenzione, non ci sono ordini!";
            $response->getBody()->write(json_encode($message_error, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-type", "application/json")->withStatus(404);
        }
        else{
            $response->getBody()->write(json_encode($arrayOrdini, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-type", "application/json")->withStatus(200);
        }
    }
}