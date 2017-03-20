<?php

class View_menu_up
{

    public function render($view ,$menu_num_echo,$restname,$menu_kind_echo,$menu_unitprice_echo,$menu_pic_echo)
    {
        include ("view/{$view}.php");
    }

}