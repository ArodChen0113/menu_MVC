<?php

class View_order_overview
{

    public function render($view , $order_name_echo, $order_price_echo , $check)
    {
        include ("view/{$view}.php");
    }

}