<?php

class View_open_index
{

    public function render($view , $op_name , $op_pic)
    {
        include ("view/{$view}.php");
    }

}