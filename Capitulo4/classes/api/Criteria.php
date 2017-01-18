<?php

/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 14/12/2016
 * Time: 13:28
 * classe responsavel para criar expressoes compostas
 */
class Criteria extends Expression
{
    private $expressions;//armazena as lista de expressoes
    private $operators; //armazena a lista de operadores
    private $properties; //propriedades do criterio

    public function __construct()
    {
        $this->expressions = array();
        $this->operators = array();
    }

    public function add(Expression $expression, $operator = self::AND_OPERATOR)
    {
        //na primeira vez nao concatenar
        if(empty($this->expressions))
        {
            $operator = null;
        }
        //agrega o resultado de expressao a lista
        $this->expressions[] = $expression;
        $this->operators[] = $operator;

    }


    public function dump()
    {
        if(is_array($this->expressions))
        {
            echo '<br>';
            if(count($this->expressions) > 0)
            {
               $result = '';
               foreach ($this->expressions as $i => $expression)
               {
                   $operator = $this->operators[$i];
                   $result .= $operator . $expression->dump() . ' ';
               }
               $result = trim($result);
               return "({$result})";
            }
        }
    }

    public function setProperty($property,$value)
    {
        if(isset($value))
        {
            $this->properties[$property] = $value;
        }
        else{
            $this->properties[$property] = null;
        }

    }

    public function getProperty($property)
    {
        if(isset($this->properties[$property]))
        {
            return $this->properties[$property];
        }
    }

}
