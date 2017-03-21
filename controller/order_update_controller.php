<?php
class order_update_select
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_order_update();
    }
    public function order_update($selectname)

    {
        require_once("model/DB_config.php");
        require_once("model/DB_Class.php");

        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->select_all("`menu_order`JOIN `menu` ON menu_order.kind = menu.kind","`name`='$selectname' AND `pay`!='9'");
        $k=0;
        while($result = $db->fetch_array())
        {
            $order_kind[$k]=$result['kind'];
            $order_unitprice[$k]=$result['unit_price'];
            $order_pic[$k]=$result['menu_picture'];
            $order_num[$k]=$result['num'];
            $k++;
        }
        $num=count($order_kind);
        for($i=0;$i<=$num-1;$i++){
            $order_kind_echo[$i]=array($order_kind[$i]);
            $order_unitprice_echo[$i]=array($order_unitprice[$i]);
            $order_pic_echo[$i]=array($order_pic[$i]);
            $order_num_echo[$i]=array($order_num[$i]);
        }
        $db->select("`price`","`menu_order`","`name`='$selectname' AND `pay`!='9'");
        while($result2 = $db->fetch_array())
        {
            $sum=$result2['price'];
        }

        $this->_view->render('order_onlineUpdate' , $order_kind_echo , $order_unitprice_echo , $order_pic_echo , $order_num_echo , $selectname , $sum);
    }

}