<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>分類管理</title>
</head>
<body>
<form name="from1" action="controller/restaurant_kind_update.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="2" align="center" bgcolor="#ABFFFF">分類管理</td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFABAB">分類名稱</td>
            <td align="center" bgcolor="#FFE5B5">刪除</td>
        </tr>
            <?php while ($row_restKind=mysqli_fetch_assoc($Rec_restKind)){
                $num=$row_restKind['num'];
                ?>
        <tr>
            <input type="hidden" name="num1[]" value="<?php echo $row_restKind['num'];?>">
            <td><input type="text" name="rest_kind1[]" value="<?php echo $row_restKind['rest_kind'];?>"></td>
            <td align="center"><a href="controller/restaurant_kind_delete.php?action1=delete&num2=<?php echo $num;?>"><img src="icon/x.jpeg" width="30" height="30"></a></td>
        </tr>
        <?php } ?>
    </table>

    <input type="hidden" name="action" value="update">
    如欲<font color="#FF0000">修改</font>餐廳分類，按下修改按鈕 >>>
    <input type="submit" value="修改分類">
</form>

<form name="from2" action="controller/restaurant_kind_add.php" method="post" enctype="multipart/form-data">
<table border="1">
        <tr>
            <td align="center" bgcolor="#FFABAB">新增分類</td>
            <td align="center"><input type="text" name="rest_kind_inster"></td>
        </tr>
    </table>
    <br>
    <input type="hidden" name="action" value="insert">
    如欲<font color="#FF0000">新增</font>餐廳分類，按下新增按鈕 >>>
    <input type="submit" value="新增分類">
</form>
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