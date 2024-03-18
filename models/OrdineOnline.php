<?php 
class OrdineOnline extends Ordine implements JsonSerializable{
    protected $indirizzo_IP;
    protected $codice_di_autorizzazione;

    public function __construct($numero_ordine, $data, $importo_totale, $indirizzo_IP, $codice_di_autorizzazione){
        parent::__construct($numero_ordine, $data, $importo_totale);
        $this->indirizzo_IP = $indirizzo_IP;
        $this->codice_di_autorizzazione = $codice_di_autorizzazione;
    }

    public function getIndirizzo_IP(){
        return $this->indirizzo_IP;
    }

    public function setIndirizzo_IP($indirizzo_IP){
        $this->indirizzo_IP = $indirizzo_IP;
    }

    public function getCodice_di_autorizzazione(){
        return $this->codice_di_autorizzazione;
    }

    public function setCodice_di_autorizzazione($codice_di_autorizzazione){
        $this->codice_di_autorizzazione = $codice_di_autorizzazione;
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