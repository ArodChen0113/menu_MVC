<?php

class View_order_update
{

    public function render($view , $order_kind_echo , $order_unitprice_echo , $order_pic_echo , $order_num_echo , $selectname , $sum)
    {
        include ("view/{$view}.php");
    }

}