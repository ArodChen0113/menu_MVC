<?php

class View_screen_show
{
    protected $kind;

    public function rest_menu_insert_index_view($view , $rest_kind_echo)
    {
        include ("view/{$view}.php");
    }

    public function restaurant_choose_view($view , $sel_restkind , $todayopen)
    {
        include ("view/{$view}.php");
        $rest_kind=$_GET['select1'];
        $kind = new restaurant_kind_name_c;
        $kind->restaurant_kind_name($rest_kind);
    }

    public function rest_kind_select_view($view , $rest_kind_echo,$rest_num_echo)
    {
        include ("view/{$view}.php");
    }

    public function rest_update_index_view($view , $restname,$restkind,$resttel,$restpic,$restnum)
    {
        include ("view/{$view}.php");
    }

    public function menu_sel_view($view ,$restname,$menu_num_echo ,$menu_kind_echo,$menu_unitprice_echo,$menu_pic_echo)
    {
        include ("view/{$view}.php");
    }

    public function menu_up_view($view ,$menu_num_echo,$restname,$menu_kind_echo,$menu_unitprice_echo,$menu_pic_echo)
    {
        include ("view/{$view}.php");
    }

    public function order_insert_index_view($view,$today_menu,$rest_openName)
    {
        include ("view/{$view}.php");
    }

    public function order_list_view($view,$open_restName,$open_restTel,$order_data,$order_unitprice,$order_pay,$order_name,$order_people,$orderCount,$totalPrice,$order_menu,$order_pic,$order_count_num,$order_price,$order_count_name)
    {
        include ("view/{$view}.php");
    }

    public function order_overview_view($view , $order_name_echo, $order_price_echo , $check)
    {
        include ("view/{$view}.php");
    }

    public function order_update_view($view , $order_kind_echo , $order_unitprice_echo , $order_pic_echo , $order_num_echo , $selectname , $sum)
    {
        include ("view/{$view}.php");
    }
}

