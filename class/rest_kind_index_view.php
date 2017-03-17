<?php

class View_restaurant_kind
{

    public function render($view , $restname,$restkind,$resttel,$restpic,$restnum)
    {
        include ("view/{$view}.php");
    }

}