<?php 
class OrdineFisico extends Ordine implements JsonSerializable{
    protected $pagamento;

    public function __construct($numero_ordine, $data, $importo_totale, $pagamento){
        parent::__construct($numero_ordine, $data, $importo_totale);
        $this->pagamento = $pagamento;
    }

    public function getPagamento(){
        return $this->pagamento;
    }

    public function setPagamento($pagamento){
        $this->pagamento = $pagamento;
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