<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$num=$_POST['num1'];
$rest_kind=$_POST['rest_kind1'];
$action=$_POST['action'];

class restaurant_kind{

    public function _Construct(){

    }

    public function restaurant_kind_update($num,$rest_kind,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table"); //設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");
        if ($action != NULL && $action == 'update')        //判斷值是否由欄位輸入
        {
            $k=0;
            $count_kind=count($num);
            for($i=1;$i<=$count_kind;$i++){
            mysqli_query($db, "UPDATE restaurant_kind SET `rest_kind` = '$rest_kind[$k]' WHERE `num`='$num[$k]'"); //修改餐廳分類
                $k++;
            }
            header("Location:restaurant_kind.php");
        }
    }
}
$restaurant = new restaurant_kind;
$restaurant -> restaurant_kind_update($num,$rest_kind,$action);

?>