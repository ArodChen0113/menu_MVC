<?php

class View_menu_index
{
    public function render($view , $rest_kind_echo)
    {
        include ("view/{$view}.php");
    }
}

