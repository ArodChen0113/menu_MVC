<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>下單系統</title>
</head>
<body>
<form action="orderPay_update.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="3" align="center" bgcolor="#ABFFFF">下單總覽</td>
        </tr>
        <tr>
            <td align="center" width="300px" bgcolor="#FFE1AB">訂購者</td>
            <td align="center" width="300px" bgcolor="#ABFFAB">總額</td>
            <td align="center" width="300px" bgcolor="#DBABFF">瀏覽修改</td>
        </tr>

        <?php
        if($check!=NULL){
        while($row_orderSelect = mysqli_fetch_assoc($orderSelect)) {
            $postname = $row_orderSelect['name'];
            ?>
            <tr>
                <td align="center"><?php echo $row_orderSelect['name']; ?></td>
                <td align="center"><?php echo $row_orderSelect['price']; ?></td>
                <td align="center"><a href="order_update_index.php?postname=<?php echo $postname; ?>"><img
                                src="icon/eye.jpeg" width="30" height="30"></a></td>
            </tr>
            <?php
        }
        }else{
            ?>
            <tr>
                <td colspan="3" align="center">今日尚無訂餐</td>
            </tr>
            <?php
        }
        ?>

    </table>
    <br>
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
<?php include("openmeal_index.php"); ?>
</body>
</html>