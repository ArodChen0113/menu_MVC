<?php
$num=$_POST['num'];
$restName=$_POST['rest_name'];
$restKind=$_POST['rest_kind'];
$restTel=$_POST['rest_tel'];
$restPic_tmpname=$_FILES['rest_picture']['tmp_name'];
$restPic_name=$_FILES['rest_picture']['name'];
$action=$_POST['action'];

class restaurant_update{

    public function _Construct(){

    }

    public function rest_update($num,$restName,$restKind,$restTel,$restPic_tmpname,$restPic_name,$action){
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db,"utf8");

        if ($action != NULL && $action == 'update')        //判斷值是否由欄位輸入
        {
            mysqli_query($db, "UPDATE restaurant SET `rest_name` = '$restName' WHERE `num` = '$num'");  //修改餐廳名稱
            mysqli_query($db, "UPDATE restaurant SET `rest_kind` = '$restKind' WHERE `num` = '$num'");  //關閉餐廳類別
            mysqli_query($db, "UPDATE restaurant SET `rest_tel` = '$restTel' WHERE `num` = '$num'");  //關閉餐廳電話
            if (!move_uploaded_file($restPic_tmpname, "photo/".$restPic_name)) {        //執行上傳
                header("Location:../restaurant_index.php");
            } else {
                mysqli_query($db, "UPDATE restaurant SET `rest_picture` = '$restPic_name' WHERE `num` = '$num'"); //新增餐廳資料
                header("Location:../restaurant_index.php");
            }

        }
    }
}

$menu = new restaurant_update;
$menu -> rest_update($num,$restName,$restKind,$restTel,$restPic_tmpname,$restPic_name,$action);
?>