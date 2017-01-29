<?php

namespace Livro\Widgets\Container;

use Livro\Widgets\Base\Element;

class Table extends Element
{
    public function __construct()
    {
        parent::__construct('table');

    }

    public function addRow()
    {
        $row = new TableRow;
        //armazena no array de linhas 
        parent::add($row);
        return $row;
    }
}