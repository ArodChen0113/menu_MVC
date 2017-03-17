<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>菜單系統</title>
</head>
<body>
<form action="orderPay_update.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="5" align="center" bgcolor="#ABFFFF">菜單總覽</td>
        </tr>
        <tr>
            <td colspan="5" align="center" bgcolor="#FFABAB"><?php echo '123'; ?></td>
        </tr>
        <tr>
            <td align="center" width="300px" bgcolor="#FFE1AB">菜單</td>
            <td align="center" width="300px" bgcolor="#ABFFAB">金額</td>
            <td align="center" width="300px" bgcolor="#00FFFF">圖片</td>
            <td align="center" width="300px" bgcolor="#DBABFF">修改</td>
            <td align="center" width="300px" bgcolor="#FFABAB">刪除</td>
        </tr>

        <?php
        while($row_menu = mysqli_fetch_assoc($Rec_menu)) {
            $num=$row_menu['m_num'];
            ?>
            <tr>
                <td align="center"><?php echo $row_menu['kind']; ?></td>
                <td align="center"><?php echo $row_menu['unit_price']; ?></td>
                <td align="center"><img src="photo/<?php echo $row_menu['menu_picture']; ?>" width="150" height="150"></td>
                <td align="center"><a href="menu_update_index.php?num1=<?php echo $num; ?>&restname1=<?php echo $restname; ?>"><img src="icon/pencil.jpeg" width="30" height="30"></a></td>
                <td align="center"><a href="controller/menu_delete.php?action1=delete&num1=<?php echo $num; ?>"><img src="icon/x.jpeg" width="30" height="30"></a></td>
            </tr>
            <?php
        }
               ?>

    </table>
    <br>
    <input type="button" value="返回餐廳管理" onclick="self.location.href='restaurant_index.php'"/>
    <br>
    <a href="index.php">新增菜單</a>
    <a href="restaurant_index.php">餐廳管理</a>
    <a href="rest_kind_index.php">餐廳分類管理</a>
    <br>
    <a href="order_index.php">下單區</a>
    <a href="order_overview_index.php">下單總覽</a>
    <br>
    <a href="order_list_index.php">訂單總覽</a>
</form>
</body>
</html>