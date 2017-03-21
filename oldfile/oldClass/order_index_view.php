<?php

class View_order
{

    public function render($view,$today_menu,$rest_openName)
    {
        include ("view/{$view}.php");
    }

}