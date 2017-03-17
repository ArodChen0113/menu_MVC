<?php

class View_menu_index
{
    public function render($view , $Rec_restKind)
    {
        include ("view/{$view}.php");
    }
}

