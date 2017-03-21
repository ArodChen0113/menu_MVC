<?php

class menu_up_c{

    protected $_view;

    public function __construct()
    {
        $this->_view = new View_menu_up();
    }

    public function menu_up($num,$restname){
        require_once("../model/DB_config.php");
        require_once("../model/DB_Class.php");

        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->select("`m_num`,`kind`,`unit_price`,`menu_picture`","`menu`","`m_num`='$num'");
        $k=0;
        while($result = $db->fetch_array())
        {
            $menu_num[$k]=$result['m_num'];
            $menu_kind[$k]=$result['kind'];
            $menu_unitprice[$k]=$result['unit_price'];
            $menu_pic[$k]=$result['menu_picture'];
            $k++;
        }
        $num=count($menu_kind);
        for($i=0;$i<=$num-1;$i++){
            $menu_num_echo[$i]=array($menu_num[$i]);
            $menu_kind_echo[$i]=array($menu_kind[$i]);
            $menu_unitprice_echo[$i]=array($menu_unitprice[$i]);
            $menu_pic_echo[$i]=array($menu_pic[$i]);
        }
        $this->_view->render('menu_update',$menu_num_echo,$restname,$menu_kind_echo,$menu_unitprice_echo,$menu_pic_echo);
    }
}

?>