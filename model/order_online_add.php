<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

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

class menu{

    public function _Construct(){

    }

    public function menu_inster($restName,$name,$totalKind,$sum,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        if ($action != NULL && $action == 'insert')        //判斷值是否由欄位輸入
        {
            $lastprice=mysqli_query($db, "SELECT `price` FROM `menu_order` WHERE `name`='$name' AND `pay`!='9' GROUP BY `price`");    //查詢之前訂購總額
            $row_lastprice=mysqli_fetch_assoc($lastprice);

            $k=0;
            $newKind = array_filter($totalKind);
            $num=count($newKind);
            for ($i=1;$i<=$num;$i++){
                mysqli_query($db, "INSERT INTO menu_order(`name`,`rest_name`,`kind`,`price`,`date`)VALUES('$name','$restName','$newKind[$k]','$sum',NOW())");  //新增至資料庫
                $k++;
            }
            $totalPrice=$row_lastprice['price']+$sum; //加總新舊訂購總額
            mysqli_query($db, "UPDATE menu_order SET `price` = '$totalPrice' WHERE `name`='$name' AND `pay`!='9'");    //查詢之前訂購總額
            header("Location:order_onlineSelect.php");
        }
    }
}

$menu = new menu;
$menu -> menu_inster($restName,$name,$totalKind,$sum,$action);
?>