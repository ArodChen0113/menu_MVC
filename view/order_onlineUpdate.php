<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>下單系統</title>
</head>
<body>
<form action="order_index.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="4" align="center" bgcolor="#ABFFFF">下單瀏覽＆修改</td>
        </tr>
        <tr>
            <td colspan="4" align="center" bgcolor="#FFABAB">訂購者：<?php echo $selectname; ?></td>
        </tr>
        <tr>
            <td align="center" width="300px" bgcolor="#FFE1AB">菜單</td>
            <td align="center" width="300px" bgcolor="#ABFFAB">單價</td>
            <td align="center" width="100px" bgcolor="#59FFFF">圖片</td>
            <td align="center" width="300px" bgcolor="#DBABFF">刪除</td>
        </tr>
        <?php
        $num=count($order_kind_echo);
        for($k=0;$k<=$num-1;$k++) {
            ?>
            <tr>
                <?php
                foreach ($order_kind_echo[$k] as $i){ ?>
                <td align="center"><?php echo $i; ?></td>
                    <?php
                }
                foreach ($order_unitprice_echo[$k] as $i){ ?>
                <td align="center"><?php echo $i; ?></td>
                    <?php
                }
                foreach ($order_pic_echo[$k] as $i){ ?>
                <td align="center"><img src="photo/<?php echo $i; ?>" width="150" height="150"></td>
                    <?php
                }
                foreach ($order_num_echo[$k] as $i) { ?>
                    <td align="center"><a
                                href="controller/order_controller.php?action=delete&num=<?php echo $i; ?>"><img
                                    src="icon/x.jpeg" width="30" height="30"></a></td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td align="center" bgcolor="#FFA1A1">總計</td>
            <td colspan="2" align="center"><?php echo $sum; ?></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="訂餐加購">
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