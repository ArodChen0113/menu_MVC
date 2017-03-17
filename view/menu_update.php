<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>菜單系統</title>
</head>
<body>
<form action="controller/menu_updateAction.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="4" align="center" bgcolor="#ABFFFF">菜單總覽</td>
        </tr>
        <tr>
            <td align="center" width="300px" bgcolor="#FFE1AB">菜單</td>
            <td align="center" width="300px" bgcolor="#ABFFAB">金額</td>
            <td align="center" width="300px" bgcolor="#FFABFF">圖片</td>
            <td align="center" width="300px" bgcolor="#FFABAB">如要修改圖片，請重新上傳</td>
        </tr>

        <?php
        while($row_menu = mysqli_fetch_assoc($menu)) {
            ?>

            <tr>
                <td><input type="text" name="kind" value="<?php echo $row_menu['kind']; ?>"></td>
                <td><input type="text" name="price" value="<?php echo $row_menu['unit_price']; ?>"></td>
                <td align="center"><img src="photo/<?php echo $row_menu['menu_picture']; ?>" width="150" height="150"></td>
                <td><input type="file" name="menu_picture"></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br>
    <input type="hidden" name="restName" value="<?php echo $restName;?>">
    <input type="hidden" name="num" value="<?php echo $num;?>">
    <input type="hidden" name="action" value="update">
    <input type="submit" value="確定修改">
    <input type="button" value="返回菜單瀏覽" onclick="self.location.href='menu_select_index.php?restname=<?php echo $restName; ?>'"/>
    <br>
    <a href="menu_index.php">新增菜單</a>
    <a href="restaurant_index.php">餐廳管理</a>
    <br>
    <a href="order_online.php">下單區</a>
    <a href="order_onlineSelect.php">下單總覽</a>
    <br>
    <a href="order.php">訂單總覽</a>>
</form>
</body>
</html>

