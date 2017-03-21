<?php
class order_overview_select
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_screen_show();
    }
    public function order_overview_show()

    {
        require_once("model/DB_config.php");
        require_once("model/DB_Class.php");

        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->select("`name`,`price`","`menu_order`","`pay`!='9' GROUP BY `name`");
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
        $this->_view->order_overview_view('order_onlineSelect' , $order_name_echo, $order_price_echo , $check);
    }

}