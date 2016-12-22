<?php

/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 30/11/2016
 * Time: 13:36
 */
class Produto extends Record
{
    const TABLENAME = 'produto';

    public function set_estoque($estoque)
    {
        if(is_numeric($estoque) AND $estoque > 0){
            $this->data['estoque'] = $estoque;
        }
        else{
           throw new Exception("estoque {$estoque} invalido em ".__CLASS__);
        }
    }






}