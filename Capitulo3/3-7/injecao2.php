<?php

require_once 'classes/Record.php';
interface ExporteInterface{
    public function export($data);
}

class XMLExporter implements ExporteInterface
{
    public function export($data)
    {
        $data = array_flip($data);
        $xml = new SimpleXMLElement('<record/>');
        array_walk_recursive($data,array($xml,'addChild'));
        return $xml->asXML();
    }

}

class JSONExporter implements ExporteInterface
{
    public function export($data)
    {
        return json_encode($data);
    }

}

class Pessoa extends Record
{
    const TABLENAME = 'produtos';
    public function export(ExporteInterface $e)
    {
        return $e->export($this->data);
    }
}

$p = new Pessoa;
$p->name = 'Maria da silva';
$p->endereco = 'Rua das Flores';
$p->numero = '123';

print $p->export(new XMLExporter);
print $p->export(new JSONExporter);


