<?php


class View_restaurant_index
{
    protected $kind;

    public function render($view , $sel_restkind , $todayopen)
    {
        include ("view/{$view}.php");
        $rest_kind=$_GET['select1'];
        $kind = new restaurant_kind_name_c;
        $kind->restaurant_kind_name($rest_kind);

    }

}