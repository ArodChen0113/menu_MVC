<?php

class View_restaurant_kind
{

    public function render($view , $rest_kind_echo,$rest_num_echo)
    {
        include ("view/{$view}.php");
    }

}