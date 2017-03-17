<?php

class View_menu_up
{

    public function render($view ,$menu,$num,$restName)
    {
        include ("view/{$view}.php");
    }

}