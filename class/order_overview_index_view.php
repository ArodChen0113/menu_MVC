<?php

class View_order_overview
{

    public function render($view , $orderSelect , $check)
    {
        include ("view/{$view}.php");
    }

}