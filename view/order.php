<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>訂單系統</title>
</head>
<body>
<form action="orderPay_update.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="3" align="center" bgcolor="#ABFFFF">訂單總覽</td>
        </tr>
        <tr>
            <td colspan="2" align="center" bgcolor="#FFABAB">今日訂餐：<?php echo $open_restName;?></td>
            <td colspan="1" align="center" bgcolor="#FFE1AB">餐廳電話：<?php echo $open_restTel;?></td>
        </tr>
        <tr>
            <td align="center" width="300px" bgcolor="#FFE1AB">訂購人</td>
            <td align="center" width="300px" bgcolor="#DBABFF">訂購金額</td>
            <td align="center" width="300px" bgcolor="#FFABAB">繳費</td>
        </tr>
        <?php
        $num=count($order_data);
        for($k=0;$k<=$num-1;$k++) {
            ?>
            <tr>
                <?php
                foreach ($order_data[$k] as $i) {
                    echo "<td align=\"center\"><b>" . $i . "</<b></td>";
                }
                foreach ($order_unitprice[$k] as $i) {
                    echo "<td align=\"center\"><b>" . $i . "</<b></td>";
                }
                foreach ($order_pay[$k] as $i) {
                ?>
                <td align="center">
                    <?php
                if($i==0){
                    ?>
                    <font color="#FF0000">尚未繳費</font>
                <?php }else if($i==1){
                    ?>
                    已繳費
                <?php }
                foreach ($order_name[$k] as $i) {
                    $payname = $i;
                    ?>
                    <a href="controller/order_controller.php?action=pay&payname=<?php echo $payname; ?>"><img
                                src="icon/th.jpeg" width="30" height="30"></a>
                <?php } ?>
                </td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td align="center">訂餐人數</td><td align="center" colspan="2"><?php echo $order_people; ?></td>
        </tr>
        <tr>
            <td align="center">餐點數量</td><td align="center" colspan="2"><?php echo $orderCount; ?>
            </td>
        </tr>
        <tr>
            <td align="center">金額總計</td><td align="center" colspan="2"><?php echo $totalPrice; ?>
            </td>
        </tr>
    </table>

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
<br>
<form action="" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="5" align="center" bgcolor="#ABFFFF">以菜單分類</td>
        </tr>
        <tr>
            <td align="center" width="300px" bgcolor="#FFE1AB">菜單</td>
            <td align="center" width="300px" bgcolor="#ABFFAB">圖片</td>
            <td align="center" width="300px" bgcolor="#00FFFF">訂購數量</td>
            <td align="center" width="300px" bgcolor="#DBABFF">單價</td>
            <td align="center" width="300px" bgcolor="#FFABAB">訂購人</td>
        </tr>
        <?php
        $num=count($order_menu);
        for($k=0;$k<=$num-1;$k++) {
            ?>
            <tr>
                <?php
                foreach ($order_menu[$k] as $i) {
                    echo "<td align=\"center\"><b>" . $i . "</<b></td>";
                }
                foreach ($order_pic[$k] as $i) {
                    ?>
                <td align="center"><img src="photo/<?php echo $i; ?>" width="150" height="150"></td>
                <?php
                }
                foreach ($order_count_num[$k] as $i) {
                    echo "<td align=\"center\"><b>" . $i . "</<b></td>";
                }
                foreach ($order_price[$k] as $i) {
                    echo "<td align=\"center\"><b>" . $i . "</<b></td>";
                }
                foreach ($order_count_name[$k] as $i) {
                    echo "<td align=\"center\"><b>" . $i . "</<b></td>";
                }
                ?>
            </tr>
            <?php
        }
        ?>

    </table>
</form>
</body>
</html>