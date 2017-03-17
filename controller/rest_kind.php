<?php
class rest_system_select
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_restaurant_kind();
    }
    public function restaurant_kind_all()
    {
        require_once("DB_config.php");
        require_once("DB_Class.php");

        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->query("SELECT `rest_kind`,`num` FROM `restaurant_kind`");
        $k=0;
        while($result = $db->fetch_array())
        {
            $rest_kind[$k]=$result['rest_kind'];
            $rest_num[$k]=$result['num'];
            $k++;
        }
        $num=count($rest_kind);
        for($i=0;$i<=$num-1;$i++){
        $rest_kind_echo[$i]=array($rest_kind[$i]);
        $rest_num_echo[$i]=array($rest_num[$i]);
        }
        $this->_view->render('restaurant_kind' , $rest_kind_echo,$rest_num_echo);
    }
}
