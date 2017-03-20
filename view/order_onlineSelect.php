<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>下單系統</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
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
        $num=count($order_name_echo);
        for($k=0;$k<=$num-1;$k++) {
            ?>
            <tr>
            <?php
            foreach ($order_name_echo[$k] as $i){ ?>
                <td align="center"><?php echo $i; ?></td>
                <?php
            }
            foreach ($order_price_echo[$k] as $i){ ?>
                <td align="center"><?php echo $i; ?></td>
                <?php
            }
            foreach ($order_name_echo[$k] as $i) { ?>
                <td align="center"><a href="order_update_index.php?postname=<?php echo $i; ?>"><img
                                src="icon/eye.jpeg" width="30" height="30"></a></td>
                <?php
            }
                ?>
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