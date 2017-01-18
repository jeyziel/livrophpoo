<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 28/12/2016
 * Time: 17:51
 */

namespace Livro\Widgets\Container;

use Livro\Widgets\Base\Element;


class TableCell extends Element
{
    public function __construct($value)
    {
        parent::__construct('td');
        parent::add($value);
    }
}