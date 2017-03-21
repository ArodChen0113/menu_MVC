<?php

class View_menu_sel
{
    public function render($view ,$restname,$menu_num_echo ,$menu_kind_echo,$menu_unitprice_echo,$menu_pic_echo)
    {
        include ("view/{$view}.php");
    }
}