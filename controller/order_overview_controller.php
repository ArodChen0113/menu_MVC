<?php
class order_overview_select
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_order_overview();
    }
    public function order_overview()

    {
        require_once("DB_config.php");
        require_once("DB_Class.php");

        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->query("SELECT `name`,`price` FROM `menu_order` WHERE `pay`!='9' GROUP BY `name`");
        $k=0;
        while($result = $db->fetch_array())
        {
            $order_name[$k]=$result['name'];
            $order_price[$k]=$result['price'];
            $k++;
        }
        $num=count($order_name);
        for($i=0;$i<=$num-1;$i++){
            $order_name_echo[$i]=array($order_name[$i]);
            $order_price_echo[$i]=array($order_price[$i]);
        }
        $check=$order_name;
        $this->_view->render('order_onlineSelect' , $order_name_echo, $order_price_echo , $check);
    }

}