<?php
class Negozio implements JsonSerializable
{
    protected $nome;
    protected $telefono;
    protected $indirizzo;
    protected $url;
    protected $p_iva;
    protected $ordini;

    protected $articoli;

    public function __construct($nome, $telefono, $indirizzo, $url, $p_iva)
    {
        $this->nome = $nome;
        $this->telefono = $telefono;
        $this->indirizzo = $indirizzo;
        $this->url = $url;
        $this->p_iva = $p_iva;
        $this->ordini = [];

        $ordine1 = new OrdineFisico(123, "23-01-2022", 4500.70, "carta");
        $articolo_venduto1 = new Articolo_venduto(14, 15.45, 200);
        $articolo_venduto2 = new Articolo_venduto(15, 20.78, 210);
        $articolo_venduto3 = new Articolo_venduto(16, 25.13, 220);
        $articolo_venduto4 = new Articolo_venduto(17, 100.97, 200);
        $ordine1->addArticoli_venduti($articolo_venduto1);
        $ordine1->addArticoli_venduti($articolo_venduto2);
        $ordine1->addArticoli_venduti($articolo_venduto3);
        $ordine1->addArticoli_venduti($articolo_venduto4);

        $ordine2 = new OrdineFisico(110, "10-06-2012", 100.12, "contanti");
        $articolo_venduto5 = new Articolo_venduto(18, 34.36, 150);
        $articolo_venduto6 = new Articolo_venduto(19, 15.55, 120);
        $articolo_venduto7 = new Articolo_venduto(20, 21.21, 210);
        $ordine2->addArticoli_venduti($articolo_venduto5);
        $ordine2->addArticoli_venduti($articolo_venduto6);
        $ordine2->addArticoli_venduti($articolo_venduto7);

        $ordine3 = new OrdineFisico(101, "08-11-2010", 64.87, "contanti");
        $articolo_venduto8 = new Articolo_venduto(21, 30.87, 250);
        $articolo_venduto9 = new Articolo_venduto(22, 34, 290);
        $ordine3->addArticoli_venduti($articolo_venduto8);
        $ordine3->addArticoli_venduti($articolo_venduto9);

        $ordine4 = new OrdineFisico(10, "08-01-2024", 950.32, "carta");
        $articolo_venduto10 = new Articolo_venduto(23, 76.78, 300);
        $articolo_venduto11 = new Articolo_venduto(24, 84.78, 200);
        $articolo_venduto12 = new Articolo_venduto(25, 83.88, 140);
        $ordine4->addArticoli_venduti($articolo_venduto10);
        $ordine4->addArticoli_venduti($articolo_venduto11);
        $ordine4->addArticoli_venduti($articolo_venduto12);

        $ordine5 = new OrdineOnline(19, "02-01-2021", 1045.87, "172.32.123.23", 12);
        $articolo_venduto13 = new Articolo_venduto(26, 34.36, 150);
        $articolo_venduto14 = new Articolo_venduto(27, 15.55, 120);
        $articolo_venduto15 = new Articolo_venduto(28, 21.21, 210);
        $ordine5->addArticoli_venduti($articolo_venduto13);
        $ordine5->addArticoli_venduti($articolo_venduto14);
        $ordine5->addArticoli_venduti($articolo_venduto15);

        $ordine6 = new OrdineOnline(13, "20-02-2023", 4445.87, "102.32.100.12", 10);
        $articolo_venduto16 = new Articolo_venduto(29, 76.78, 300);
        $articolo_venduto17 = new Articolo_venduto(30, 84.78, 200);
        $articolo_venduto18 = new Articolo_venduto(31, 83.88, 140);
        $ordine6->addArticoli_venduti($articolo_venduto16);
        $ordine6->addArticoli_venduti($articolo_venduto17);
        $ordine6->addArticoli_venduti($articolo_venduto18);

        $ordine7 = new OrdineOnline(18, "07-03-2010", 4750, "152.32.60.12", 9);
        $articolo_venduto19 = new Articolo_venduto(32, 29.37, 250);
        $articolo_venduto20 = new Articolo_venduto(33, 39.78, 290);
        $ordine7->addArticoli_venduti($articolo_venduto19);
        $ordine7->addArticoli_venduti($articolo_venduto20);

        $ordine8 = new OrdineOnline(17, "15-04-2020", 4587, "12.32.100.10", 24);
        $articolo_venduto21 = new Articolo_venduto(34, 15.45, 200);
        $articolo_venduto22 = new Articolo_venduto(35, 20.78, 210);
        $articolo_venduto23 = new Articolo_venduto(36, 25.13, 220);
        $articolo_venduto24 = new Articolo_venduto(37, 100.97, 200);
        $ordine8->addArticoli_venduti($articolo_venduto21);
        $ordine8->addArticoli_venduti($articolo_venduto22);
        $ordine8->addArticoli_venduti($articolo_venduto23);
        $ordine8->addArticoli_venduti($articolo_venduto24);

        $this->addOrdine($ordine1);
        $this->addOrdine($ordine2);
        $this->addOrdine($ordine3);
        $this->addOrdine($ordine4);
        $this->addOrdine($ordine5);
        $this->addOrdine($ordine6);
        $this->addOrdine($ordine7);
        $this->addOrdine($ordine8);

        $this->articoli = [];
        $articolo1 = new Articolo(14, "Iphone11", "Giallo", 980);
        $articolo2 = new Articolo(15, "Iphone14", "Grigio", 1500.50);
        $articolo3 = new Articolo(16, "IphoneX", "Blu", 1020);
        $articolo4 = new Articolo(17, "Iphone12", "Nero", 1300);
        $articolo5 = new Articolo(18, "SamsungA14", "Grigio", 1200);
        $articolo6 = new Articolo(19, "XiaomiRedmiNote8", "Bianco", 320);
        $articolo7 = new Articolo(20, "IphoneS", "Grigio", 1200);
        $this->addArticolo($articolo1);
        $this->addArticolo($articolo2);
        $this->addArticolo($articolo3);
        $this->addArticolo($articolo4);
        $this->addArticolo($articolo5);
        $this->addArticolo($articolo6);
        $this->addArticolo($articolo7);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getP_iva()
    {
        return $this->p_iva;
    }

    public function setP_iva($p_iva)
    {
        $this->p_iva = $p_iva;
    }

    public function getOrdini()
    {
        return $this->ordini;
    }

    public function addOrdine($ordine)
    {
        return array_push($this->ordini, $ordine);
    }

    public function getArticoli()
    {
        return $this->articoli;
    }

    public function addArticolo($articolo)
    {
        return array_push($this->articoli, $articolo);
    }

    public function findByIndex($id)
    {
        $in = false;
        foreach ($this->getArticoli() as $articolo) {
            if ($articolo->getId() == $id) {
                return $articolo;
            }
        }
        if (!$in) {
            return null;
        }
    }

    public function findByNumber($numero_ordine)
    {
        $in = false;
        foreach ($this->getOrdini() as $ordine) {
            if ($ordine->getNumero_ordine() == $numero_ordine) {
                return $ordine;
            }
        }
        if (!$in) {
            return null;
        }
    }

    public function getSconto($ordine){
        $somma_prezzi_listino = 0;
        $somma_prezzi_vendita = 0;
        $arrayUguali = [];
        foreach ($ordine->getArticoli_Venduti() as $articolo_venduto) {
            $somma_prezzi_vendita += $articolo_venduto->getPrezzo_di_vendita();
            foreach ($this->getArticoli() as $articolo) {
                if($articolo->getId() == $articolo_venduto->getId()) {
                    array_push($arrayUguali, $articolo);
                }
            }
        }
        foreach ($arrayUguali as $articolo_in_comune) {
            $somma_prezzi_listino += $articolo_in_comune->getPrezzo_di_listino();
        }
        return $somma_prezzi_listino-$somma_prezzi_vendita;
    }

    public function jsonSerialize()
    {
        $attrs = [];
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
            $attrs[$name] = $this->{$name};
        }
        return $attrs;
    }
}