<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class NegozioController{
    public function negozio(Request $request, Response $response, $args){
        $negozio = new Negozio("MEDIAWORLD", "3334441234", "Via del Filarete", "https://www.mediaworld.it/", "12121212");
        $response->getBody()->write(json_encode($negozio, JSON_PRETTY_PRINT));
        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }
}