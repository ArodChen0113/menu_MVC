<?php
include ("../class/view.php");

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
}else if($_GET['action']=='detail'){
    $select1=$_GET["select1"];
    $select2=$_GET["select2"];
    $select3=$_GET["select3"];
    $select4=$_GET["select4"];
    $select5=$_GET["select5"];
    $c = new order_system();
    $c->order_detail_show($select1,$select2,$select3,$select4,$select5);
}else if($_GET['action']=='pay') {
    $name=$_GET['payname'];
    $action=$_GET['action'];
    $c = new order_system;
    $c->order_pay($name, $action);
}
class order_system
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View_screen_show();
    }
    public function order_insert_index()  //訂購單顯示控制

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
        $this->_view->order_insert_index_view('order_online',$today_menu,$rest_openName);
    }

    public function order_detail_show($select1,$select2,$select3,$select4,$select5) //訂購單細節顯示控制
    {
        require_once("../model/DB_config.php");
        require_once("../model/DB_Class.php");
        $db = new DB();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
        $db -> select("`unit_price`,`menu_picture`","`menu`","`kind`='$select1'"); //訂購選單1
        while($result1 = $db->fetch_array())
        {
            $price1=$result1['unit_price'];
            $pic1=$result1['menu_picture'];
        }
        $db -> select("`unit_price`,`menu_picture`","`menu`","`kind`='$select2'"); //訂購選單2
        while($result2 = $db->fetch_array())
        {
            $price2=$result2['unit_price'];
            $pic2=$result2['menu_picture'];
        }
        $db -> select("`unit_price`,`menu_picture`","`menu`","`kind`='$select3'"); //訂購選單3
        while($result3 = $db->fetch_array())
        {
            $price3=$result3['unit_price'];
            $pic3=$result3['menu_picture'];
        }
        $db -> select("`unit_price`,`menu_picture`","`menu`","`kind`='$select4'"); //訂購選單4
        while($result4 = $db->fetch_array())
        {
            $price4=$result4['unit_price'];
            $pic4=$result4['menu_picture'];
        }
        $db -> select("`unit_price`,`menu_picture`","`menu`","`kind`='$select5'"); //訂購選單5
        while($result5 = $db->fetch_array())
        {
            $price5=$result5['unit_price'];
            $pic5=$result5['menu_picture'];
        }
        $sum=$price1+$price2+$price3+$price4+$price5;
        header("Location:../order_index.php?select1=$select1&price1=$price1&pic1=$pic1&select2=$select2&price2=$price2&pic2=$pic2&select3=$select3&price3=$price3&pic3=$pic3&select4=$select4&price4=$price4&pic4=$pic4&select5=$select5&price5=$price5&pic5=$pic5&sum=$sum");
    }

    public function order_update_show($selectname) //訂單修改畫面顯示控制
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

        $this->_view->order_update_view('order_onlineUpdate' , $order_kind_echo , $order_unitprice_echo , $order_pic_echo , $order_num_echo , $selectname , $sum);
    }

    public function order_overview_show() //訂單總覽顯示控制

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

    public function order_list_show() //訂單明細顯示控制

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

    public function order_insert($restName,$name,$totalKind,$sum,$action) //新增訂購項目
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

    public function order_pay($name,$action) //訂單付款控制
    {

        if ($action != NULL && $action == 'pay') //判斷值是否由欄位輸入
        {
            require_once("../model/DB_config.php");
            require_once("../model/DB_Class.php");
            $db = new DB();
            $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
            $db->update("menu_order","`pay` = '1'","`name`='$name' AND `pay`!='9'");  //修改成已繳費
            header("Location:../order_list_index.php");
        }
    }

}