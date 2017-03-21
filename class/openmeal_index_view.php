<?php

class View_open_index
{

    public function openmeal_view($view , $op_name , $op_pic)
    {
        include ("view/{$view}.php");
    }

}