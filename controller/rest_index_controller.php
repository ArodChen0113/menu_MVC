<?php

class restaurant_kind_name_c
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_restaurant_index();
    }
    public function restaurant_kind()
    {
        require_once("DB_config.php");
        require_once("DB_Class.php");

        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);

        $db->query("SELECT `rest_kind` FROM `restaurant_kind`"); //分類選單1
        $k=0;
        while($result = $db->fetch_array())
        {
            $rest_kind[$k]=$result['rest_kind'];;
            $k++;
        }
        $num=count($rest_kind);
        for($i=0;$i<=$num-1;$i++){
            $sel_restkind[$i]=array($rest_kind[$i]);
        }

        $db->query("SELECT `rest_name` FROM `restaurant` WHERE `rest_open` = '1'"); //今日開餐
        while($result2 = $db->fetch_array())
        {
            $todayopen=$result2['rest_name'];;
        }
        $this->_view->render('restaurant_index' , $sel_restkind , $todayopen);
    }
}