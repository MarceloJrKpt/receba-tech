<?php 

namespace Model;

class Pedido
{
    //Atributos
    private $codPedido; 
    public $dataHora;
    public $ingredientes;
    public $qtde;
    public $pgto;
    public $entrega;

    //Metodos
    public function __construct()
    {
        echo $this->gerarCodigo();
        echo $this->dataDoPedido();
    }

    private function dataDoPedido()
    {
         date_default_timezone_set('America/Sao_Paulo'); 
         $this->dataHora = date('Y-m-d H:i:s');
         return "<br>Data e hora do pedido:" . date("d/m/Y H:i:s");  
    }

    public function gerarCodigo()
    {
        $this->codPedido = random_int(100, 500);
        return $this->codPedido;
    }

    public function darDesconto()
    {
        if($this-> qtde >=5 || $this->entrega == "Santa Isabel") {
            return "<h2> 10% off dsclp sor </h2>";
        }
    }

    public function verificaSeTempao()
    {
        $achou = false;
        foreach($this->ingredientes as $item){
            if($item == "Pão") {
                 
            }
        }
    }
}