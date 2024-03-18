<?php 
class Negozio implements JsonSerializable{
    protected $nome;
    protected $telefono;
    protected $indirizzo;
    protected $url;
    protected $p_iva;
    protected $ordini;

    protected $articoli;

    public function __construct($nome, $telefono, $indirizzo, $url, $p_iva){
        $this->nome = $nome;
        $this->telefono = $telefono;
        $this->indirizzo = $indirizzo;
        $this->url = $url;
        $this->p_iva = $p_iva;
        $this->ordini = [];
        $this->articoli = [];
        $ordine1 = new OrdineFisico(123, "23-01-2022", 45.70, "carta");
        $ordine2 = new OrdineFisico(110, "10-06-2012", 100.12, "contanti");
        $ordine3 = new OrdineFisico(101, "08-11-2010", 34.87, "contanti");
        $ordine4 = new OrdineFisico(123, "08-01-2024", 50.32, "carta");

        $ordine5 = new OrdineOnline(123, "23-01-2022", 45.87, "172.32.123.23",12);
        $ordine6 = new OrdineOnline(123, "23-01-2022", 45.87, "102.32.100.12",10);
        $ordine7 = new OrdineOnline(123, "23-01-2022", 45.87, "152.32.60.12",09);
        $ordine8 = new OrdineOnline(123, "23-01-2022", 45.87, "12.32.100.10",24);

        $ordine9 = new OrdineFisico(123, "23-01-2022", 45.87, "contanti");
        $ordine10 = new OrdineOnline(123, "23-01-2022", 45.87, "172.32.123.23",12);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getIndirizzo(){
        return $this->indirizzo;
    }

    public function setIndirizzo($indirizzo){
        $this->indirizzo = $indirizzo;
    }

    public function getUrl(){
        return $this->url;
    }

    public function setUrl($url){
        $this->url = $url;
    }

    public function getP_iva(){
        return $this->p_iva;
    }

    public function setP_iva($p_iva){
        $this->p_iva = $p_iva;
    }

    public function getOrdini(){
        return $this->ordini;
    }

    public function addOrdine($ordine){
        return array_push($this->ordini, $ordine);
    }

    public function getArticoli(){
        return $this->articoli;
    }

    public function addArticolo($articolo){
        return array_push($this->articoli, $articolo);
    }
    
    public function jsonSerialize(){
        $attrs = [];
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
            $attrs[$name]=$this->{$name};
        }
        return $attrs;
    }
}