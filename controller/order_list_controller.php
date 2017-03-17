<?php
class order_list_select
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_order_list();
    }
    public function order_list()

    {
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        $Rec_orderRest=mysqli_query($db, "SELECT `rest_name`,`rest_tel` FROM `restaurant` WHERE `rest_open`='1'"); //今日開餐＆電話
        $row_orderRest=mysqli_fetch_assoc($Rec_orderRest);
        $open_restName=$row_orderRest['rest_name'];
        $open_restTel=$row_orderRest['rest_tel'];

        $Rec_ordername=mysqli_query($db, "SELECT `name`,`price`FROM `menu_order` WHERE `pay`!='9' GROUP BY `name`"); //訂購名單
        $k=0;
        while($row_orderName=mysqli_fetch_assoc($Rec_ordername)){
            $order_data[$k]=$row_orderName;
            $k++;
        }
        $Rec_orderpay=mysqli_query($db, "SELECT `pay`FROM `menu_order` WHERE `pay`!='9' GROUP BY `name`"); //是否付款
        $k=0;
        while($row_orderpay=mysqli_fetch_assoc($Rec_orderpay)){
            $order_pay[$k]=$row_orderpay;
            $k++;
        }
        $Rec_ordername=mysqli_query($db, "SELECT `name`FROM `menu_order` WHERE `pay`!='9' GROUP BY `name`"); //付款名單
        $k=0;
        while($row_ordername=mysqli_fetch_assoc($Rec_ordername)){
            $order_name[$k]=$row_ordername;
            $k++;
        }
        $order_person=mysqli_query($db, "SELECT DISTINCT `name`as person FROM `menu_order` WHERE `pay`!='9'"); //訂餐人數
        $order_people=0;
        while ($row_orderPerson=mysqli_fetch_assoc($order_person)){
            $order_people++;
        }

        $order_count=mysqli_query($db, "SELECT COUNT(`name`)as orderCount FROM `menu_order` WHERE `pay`!='9'"); //餐點數量
        $row_orderCount=mysqli_fetch_assoc($order_count);

        $order_sum=mysqli_query($db, "SELECT DISTINCT `name`,price FROM `menu_order` WHERE `pay`!='9'"); //金額總計
        $totalPrice=0;
        while ($row_orderSum=mysqli_fetch_assoc($order_sum)){
            $totalPrice=$totalPrice+$row_orderSum['price'];
        }

        $Rec_ordermenu=mysqli_query($db, "SELECT `kind` FROM `menu_order` WHERE `pay`!='9' GROUP BY `kind`");  //訂購菜單
        $k=0;
        while($row_ordermenu=mysqli_fetch_assoc($Rec_ordermenu)){
            $order_menu[$k]=$row_ordermenu;

            $select_orderkind=$row_ordermenu['kind'];
            $orderMenu_data=mysqli_query($db, "SELECT `menu_picture` FROM `menu` WHERE `kind`='$select_orderkind'"); //菜單圖片
            while ($row_orderMenu_data = mysqli_fetch_assoc($orderMenu_data)){
                $order_pic[$k]=$row_orderMenu_data;
            }
            $orderMenu_price=mysqli_query($db, "SELECT `unit_price` FROM `menu` WHERE `kind`='$select_orderkind'"); //菜單價錢
            while ($row_orderMenu_price = mysqli_fetch_assoc($orderMenu_price)){
                $order_price[$k]=$row_orderMenu_price;
            }
            $orderMenu_count=mysqli_query($db, " SELECT COUNT(`kind`) as Countkind FROM `menu_order` WHERE `kind`='$select_orderkind' AND `pay`!='9'"); //菜單價錢
            while ($row_orderMenu_count = mysqli_fetch_assoc($orderMenu_count)){
                $order_count_num[$k]=$row_orderMenu_count;
            }
            $orderMenu_name=mysqli_query($db, "SELECT `name` FROM `menu_order` WHERE `kind`='$select_orderkind' AND `pay`!='9'"); //菜單價錢
            while ($row_orderMenu_name = mysqli_fetch_assoc($orderMenu_name)){
                $order_count_name[$k]=$row_orderMenu_name;
            }
            $k++;
        }
        $this->_view->render('order',$open_restName,$open_restTel,$order_data,$order_pay,$order_name,$order_people,$row_orderCount,$totalPrice,$order_menu,$order_pic,$order_count_num,$order_price,$order_count_name);
    }

}