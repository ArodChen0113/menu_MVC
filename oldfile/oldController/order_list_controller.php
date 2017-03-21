<?php
class order_list_select
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_screen_show();
    }
    public function order_list_show()

    {
        require_once("model/DB_config.php");
        require_once("model/DB_Class.php");
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->select("`rest_name`,`rest_tel`", "`restaurant`", "`rest_open`='1'"); //今日開餐＆電話
        while ($result1 = $db->fetch_array()) {
            $open_restName = $result1['rest_name'];
            $open_restTel = $result1['rest_tel'];
        }

        $db->select("`name`,`price`", "`menu_order`", "`pay`!='9' GROUP BY `name`"); //訂購名單
        $k = 0;
        while ($result2 = $db->fetch_array()) {
            $row_name[$k] = $result2['name'];
            $k++;
        }
        $num = count($row_name);
        for ($i = 0; $i <= $num - 1; $i++) {
            $order_data[$i] = array($row_name[$i]);
        }

        $db->select("`name`,`price`", "`menu_order`", "`pay`!='9' GROUP BY `name`"); //訂購單價
        $k = 0;
        while ($result3 = $db->fetch_array()) {
            $row_price[$k] = $result3['price'];
            $k++;
        }
        $num = count($row_price);
        for ($i = 0; $i <= $num - 1; $i++) {
            $order_unitprice[$i] = array($row_price[$i]);
        }

        $db->select("`pay`", "`menu_order`", "`pay`!='9' GROUP BY `name`"); //是否付款
        $k = 0;
        while ($result4 = $db->fetch_array()) {
            $row_pay[$k] = $result4['pay'];
            $k++;
        }
        $num = count($row_pay);
        for ($i = 0; $i <= $num - 1; $i++) {
            $order_pay[$i] = array($row_pay[$i]);
        }

        $db->select("`name`", "`menu_order`", "`pay`!='9' GROUP BY `name`"); //付款名單
        $k = 0;
        while ($result5 = $db->fetch_array()) {
            $row_ordername[$k] = $result5['name'];
            $k++;
        }
        $num = count($row_ordername);
        for ($i = 0; $i <= $num - 1; $i++) {
            $order_name[$i] = array($row_ordername[$i]);
        }

        $db->select("DISTINCT `name`as person", "`menu_order`", "`pay`!='9'"); //訂餐人數
        $order_people = 0;
        while ($result6 = $db->fetch_array()) {
            $row_person = $result6['person'];
            $order_people++;
        }

        $db->select("COUNT(`name`)as orderCount", "`menu_order`", "`pay`!='9'"); //餐點數量
        while ($result7 = $db->fetch_array()) {
            $orderCount = $result7['orderCount'];
        }

        $db->select("DISTINCT `name`,price", "`menu_order`", "`pay`!='9'");  //金額總計
        $totalPrice = 0;
        while ($result8 = $db->fetch_array()) {
            $row_ordersum = $result8['price'];
            $totalPrice = $totalPrice + $row_ordersum;
        }

        $db->select("`kind`", "`menu_order`", "`pay`!='9' GROUP BY `kind`"); //訂購菜單
        $k = 0;
        while ($result9 = $db->fetch_array()) {
            $row_menu[$k] = $result9['kind'];
            $k++;
        }
        $num = count($row_menu);
        for ($i = 0; $i <= $num - 1; $i++) {
            $order_menu[$i] = array($row_menu[$i]);
        }

        $count=count($row_menu);
        for($c=0;$c<=$count-1;$c++) {
            $select_orderkind = $row_menu[$c];
            $db->select("`menu_picture`", "`menu`", "`kind`='$select_orderkind'"); //菜單圖片
            while ($result10 = $db->fetch_array()) {
                $row_pic[$c] = $result10['menu_picture'];
            }
        }
        $num = count($row_pic);
        for ($i = 0; $i <= $num - 1; $i++) {
            $order_pic[$i] = array($row_pic[$i]);
        }

        for($c=0;$c<=$count-1;$c++) {
            $select_orderkind = $row_menu[$c];
            $db->select("`unit_price`", "`menu`", "`kind`='$select_orderkind'"); //菜單價錢
            while ($result11 = $db->fetch_array()) {
                $row_unitprice[$c] = $result11['unit_price'];
            }
        }

        $num = count($row_unitprice);
        for ($i = 0; $i <= $num - 1; $i++) {
            $order_price[$i] = array($row_unitprice[$i]);
        }

        for($c=0;$c<=$count-1;$c++) {
            $select_orderkind = $row_menu[$c];
            $db->select("COUNT(`kind`) as Countkind", "`menu_order`", "`kind`='$select_orderkind' AND `pay`!='9'"); //點餐數量
            while ($result12 = $db->fetch_array()) {
                $row_countkind[$c] = $result12['Countkind'];
            }
        }
        $num = count($row_countkind);
        for ($i = 0; $i <= $num - 1; $i++) {
            $order_count_num[$i] = array($row_countkind[$i]);
        }

        for($c=0;$c<=$count-1;$c++) {
            $select_orderkind = $row_menu[$c];
            $db->select("`name`", "`menu_order`", "`kind`='$select_orderkind' AND `pay`!='9'"); //點餐名單
            while ($result13 = $db->fetch_array()) {
                $row_ordermenu_name[$c] = $result13['name'];
            }
        }
        $num = count($row_ordermenu_name);
        for ($i = 0; $i <= $num - 1; $i++) {
            $order_count_name[$i] = array($row_ordermenu_name[$i]);
        }

        $this->_view->order_list_view('order',$open_restName,$open_restTel,$order_data,$order_unitprice,$order_pay,$order_name,$order_people,$orderCount,$totalPrice,$order_menu,$order_pic,$order_count_num,$order_price,$order_count_name);
    }

}