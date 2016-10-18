<?php

require ('../../config.php');


class Produto{
    public $Descricao;
    public $Estoque;
    public $Preco;

    
    public function AumentarEstoque($Unidades){
        if(is_numeric($Unidades) && $Unidades >= 0){
            $this->Estoque += (int)$Unidades;
        }

    }

    public function DiminuirEstoque($Unidades){
        if(is_int($Unidades) && $Unidades >= 0){
            $this->Estoque -= (int)$Unidades;
        }
    }

    public function ReajustarPreco($Percentual){
        if(is_numeric($Percentual) && $Percentual >=0){
            $this->Preco *= (1+($Percentual/100));
        }
    }


}


//instancie abaixo.



























