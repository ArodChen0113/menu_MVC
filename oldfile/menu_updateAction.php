<?php
$restName=$_POST['restName'];
$num=$_POST['num'];
$kind=$_POST['kind'];
$price=$_POST['price'];
$action=$_POST['action'];
$menu_tmpname=$_FILES['menu_picture']['tmp_name'];
$menu_name=$_FILES['menu_picture']['name'];

class menu
{

    public function _Construct()
    {

    }

    public function menu_inster($restName,$num, $kind, $price, $action, $menu_tmpname, $menu_name)
    {
        $db_host = "127.0.0.1";  //主機位置
        $db_table = "test";      //資料庫名稱
        $db_username = "root";   //資料庫帳號
        $db_password = "root";   //資料庫密碼
        $db = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_table");//設定資料連線
        $dbset = mysqli_set_charset($db, "utf8");

        if ($action != NULL && $action == 'update')        //判斷值是否由欄位輸入
        {
            mysqli_query($db, "UPDATE menu SET `kind` = '$kind' WHERE `m_num`='$num'");  //修改菜單名稱
            mysqli_query($db, "UPDATE menu SET `unit_price` = '$price' WHERE `m_num`='$num'");  //修改菜單單價

            if (!move_uploaded_file($menu_tmpname, "photo/" . $menu_name)) {        //執行上傳
                header("Location:../menu_select_index.php?restname=$restName");
            } else {
                mysqli_query($db, "UPDATE menu SET `menu_picture` = '$menu_name' WHERE `num`='$num'"); //新增菜單資料
                header("Location:../menu_select_index.php?restname=$restName");
            }
        }
    }
}
$menu = new menu;
$menu->menu_inster($restName,$num, $kind, $price, $action, $menu_tmpname, $menu_name);

?>