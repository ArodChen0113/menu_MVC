<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>餐廳系統</title>
</head>
<body>
<form name="rest_open" action="controller/restaurant_update_add.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="3" align="center" bgcolor="#FFABAB">餐廳管理</td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFE1AB">餐廳名稱</td>
            <td align="center" bgcolor="#ABFFAB">分類</td>
            <td align="center" bgcolor="#DBABFF">電話</td>
        </tr>
        <tr>
            <td><input type="text" name="rest_name" value="<?php echo $restname;?>"></td>
            <td><input type="text" name="rest_kind" value="<?php echo $restkind;?>"></td>
            <td><input type="text" name="rest_tel" value="<?php echo $resttel;?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center" bgcolor="#ABFFFF">菜單</td>
            <td align="center" bgcolor="#DBABFF">上傳欲修改菜單圖片</td>
        </tr>
        <tr>
            <td colspan="2"><img src="photo/<?php echo $restpic; ?>" width="800" height="600"></td>
            <td><input type="file" name="rest_picture" size="30"></td>
        </tr>
    </table>
    <br>
    <input type="hidden" name="num" value="<?php echo $restnum; ?>">
    <input type="hidden" name="action" value="update">
    如欲<font color="#FF0000">修改</font>餐廳資料，按下修改按鈕 >>>
    <input type="submit" value="確定修改">
    如欲瀏覽<font color="#FF0000">菜單</font>資料，按下瀏覽按鈕 >>>
    <input type="button" value="菜單瀏覽" onclick="self.location.href='menu_select_index.php?restname=<?php echo $restname; ?>'"/>
    如欲<font color="#FF0000">刪除</font>這間餐廳，按下刪除按鈕 >>>
    <a href="controller/restaurant_delete.php?action1=delete&restname=<?php echo $restname; ?>"><img src="icon/x.jpeg" width="30" height="30"></a>
    <br>
    <a href="index.php">新增菜單</a>
    <a href="restaurant_index.php">餐廳管理</a>
    <a href="rest_kind_index.php">餐廳分類管理</a>
    <br>
    <a href="order_index.php">下單區</a>
    <a href="order_overview_index.php">下單總覽</a>
    <br>
    <a href="order_list_index.php">訂單總覽</a>
</body>
</html>
