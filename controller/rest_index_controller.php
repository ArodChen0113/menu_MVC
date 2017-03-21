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
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db -> select_all('restaurant_kind','');
        $k=0;
        while($result = $db->fetch_array())
        {
            $rest_kind[$k]=$result['rest_kind'];
            $k++;
        }
        $num=count($rest_kind);
        for($i=0;$i<=$num-1;$i++){
            $sel_restkind[$i]=array($rest_kind[$i]);
        }
        $db -> select_all('restaurant',"`rest_open` = '1'");
        while($result2 = $db->fetch_array())
        {
            $todayopen=$result2['rest_name'];
        }
        $this->_view->render('restaurant_index' , $sel_restkind , $todayopen);
    }
}