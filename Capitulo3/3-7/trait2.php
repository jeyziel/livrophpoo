<?php

require_once'classes/Record.php';

trait ObjectConversionTrait{
    public function toXML(){
        $data = array_flip($this->data);
        $xml = new SimpleXMLElement('<'. get_class($this). '/>');
        array_walk_recursive($data,array($xml,'addChild'));
        //var_dump($data);
        return $xml->asXML();
    }

    public function toJSON(){
        return json_encode($this->data);
    }
}

//clases

class Pessoa extends Record{
    const TABLENAME = 'pessoas';
    use ObjectConversionTrait{
      toJSON  as exportToJSON;
    }
}

class Fornecedor extends Record{
    const TABLENAME = 'fornecedores';
}

class Produto extends Record{
    const TABLENAME = 'produto';
}

$p = new Pessoa;

print '<br>' . PHP_EOL;

$p->name = 'Maria da silva';
$p->endereco = 'Rua das Flores';
$p->numero = '123';

print '<br>' . PHP_EOL;
file_put_contents('dados.xml',$p->toXML());
//print $p->toXML();
print $p->exportToJSON();
