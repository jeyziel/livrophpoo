<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 28/12/2016
 * Time: 16:30
 */

namespace Livro\Widgets\Container;

use Livro\Widgets\Base\Element;


class TableRow extends Element
{
    public function __construct()
    {
        parent::__construct('tr');
    }

    public function addCell($value)
    {
        $cell = new TableCell($value);
        parent::add($cell);

        return $cell;
    }
}