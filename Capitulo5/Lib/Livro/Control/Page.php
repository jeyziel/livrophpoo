<?php
/**
 * Created by PhpStorm.
 * User: jeyzi
 * Date: 21/12/2016
 * Time: 18:19
 */

namespace Livro\Control;


class Page
{
    public function show()
    {

        if($_GET){
            $class = $_GET['class']?? null;
            $method = $_GET['method']?? null;

            if($class){
                $object = $class == get_class($this) ? $this : new $class;
                if(method_exists($object,$method)){
                    call_user_func(array($object,$method));
                }
            }
        }

    }


}