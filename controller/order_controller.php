<?php
include ("../class/order_index_view.php");

if($_POST['action']=='insert'){
    $restName=$_POST['restname'];
    $name=$_POST['orderName'];
    $kind1=$_POST['kind_p1'];
    $kind2=$_POST['kind_p2'];
    $kind3=$_POST['kind_p3'];
    $kind4=$_POST['kind_p4'];
    $kind5=$_POST['kind_p5'];
    $sum=$_POST['sum'];
    $action=$_POST['action'];
    $totalKind=array("$kind1","$kind2","$kind3","$kind4","$kind5");
    $c= new order_system;
    $c-> order_insert($restName,$name,$totalKind,$sum,$action);
}else if($_GET['action']=='delete') {
    $num=$_GET['num'];
    $action=$_GET['action'];
    $c = new order_system;
    $c->order_delete($num, $action);
}
class order_system
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_order();
    }
    public function order_insert_index()  //訂購單控制

    {
        require_once("model/DB_config.php");
        require_once("model/DB_Class.php");
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db->select("`rest_name`","`restaurant`","`rest_open`='1'");   //今日開餐餐廳名稱
        while($result = $db->fetch_array())
        {
            $rest_openName=$result['rest_name'];
        }
        $db->select("`kind`","`menu`","`rest_name`='$rest_openName'"); //今日開餐菜單選項
        $k=0;
        while($result = $db->fetch_array()){
            $rest_kind[$k]=$result['kind'];
            $k++;
        }
        $num=count($rest_kind);
        for($i=0;$i<=$num-1;$i++){
            $today_menu[$i]=array($rest_kind[$i]);
        }
        $this->_view->render('order_online',$today_menu,$rest_openName);
    }

    public function order_insert($restName,$name,$totalKind,$sum,$action) //新增訂購單
    {

        if ($action != NULL && $action == 'insert')      //判斷值是否由欄位輸入
        {
            require_once("../model/DB_config.php");
            require_once("../model/DB_Class.php");
            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
            $db->select("`price`","`menu_order`","`name`='$name' AND `pay`!='9' GROUP BY `price`");  //查詢之前訂購總額
            while($result = $db->fetch_array())
            {
                $lastprice=$result['price'];
            }
            $k=0;
            $newKind = array_filter($totalKind);
            $num=count($newKind);
            for ($i=1;$i<=$num;$i++){
                $db->insert("menu_order","`name`,`rest_name`,`kind`,`price`,`date`","'$name','$restName','$newKind[$k]','$sum',NOW()"); //新增至資料庫
                $k++;
            }
            $totalPrice=$lastprice+$sum; //加總新舊訂購總額
            $db->update("menu_order","`price` = '$totalPrice'","`name`='$name' AND `pay`!='9'");   //修改訂購總額
            header("Location:../order_overview_index.php");
        }
    }

    public function order_delete($num,$action) //刪除訂購項目
    {

        if ($action != NULL && $action == 'delete') //判斷值是否由欄位輸入
        {
            require_once("../model/DB_config.php");
            require_once("../model/DB_Class.php");
            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
            $db->select("`price`,`kind`,`name`","`menu_order`","`num`='$num'");   //查詢刪除訂購菜色價格
            while($result = $db->fetch_array())
            {
                $price=$result['price'];
                $name=$result['name'];
                $kind=$result['kind'];
            }
            $db->select("`unit_price`","`menu`","`kind`='$kind'");  //查詢之前訂購總額
            while($result2 = $db->fetch_array())
            {
                $unitprice=$result2['unit_price'];
            }
            $updateptice=$price-$unitprice; //修改後訂購總額
            $db->update("menu_order","`price` = '$updateptice'","`name`='$name'");  //修改訂購總額
            $db->delete("menu_order","`num`='$num'");  //刪除訂購項目
            header("Location:../order_update_index.php?postname=$name");
        }
    }

}