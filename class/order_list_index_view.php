<?php

class View_order_list
{

    public function render($view,$open_restName,$open_restTel,$order_data,$order_pay,$order_name,$order_people,$row_orderCount,$totalPrice,$order_menu,$order_pic,$order_count_num,$order_price,$order_count_name)
    {
        include ("view/{$view}.php");
    }

}