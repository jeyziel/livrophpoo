<?php

class Filter extends Expression
{
    private $variable; // variavel
    private $operator; //operador
    private $value; //valor

    public function __construct($variables,$operator,$value)
    {
        //armazena as propriedades
        $this->variable = $variables;
        $this->operator = $operator;

        //transformar o valor de acordo com certa regras de tipo
        $this->value = $this->transform($value);
    }

    public function transform($value)
    {
        if(is_array($value))
        {
            foreach ($value as $x)
            {
                if(is_integer($x))
                {
                    $foo[] = $x;
                }
                elseif(is_string($x))
                {
                    $foo[] = "'$x'";
                }
            }
            $result = '(' . implode(',', $foo) . ')';
        }
        elseif (is_string($value))
        {

            $result = "'$value'";
        }
        elseif(is_null($value))
        {
            $result = 'NULL';
        }
        elseif(is_bool($value))
        {
            $result = $value ? 'TRUE' : 'FALSE';
        }
        else
        {
            $result = $value;
        }
        return $result;
    }

    public function dump()
    {
        return "{$this->variable} {$this->operator} {$this->value}";
    }


}