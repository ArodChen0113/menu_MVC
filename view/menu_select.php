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
            <td colspan="5" align="center" bgcolor="#FFABAB"><?php echo '餐廳名稱：'.$restname; ?></td>
        </tr>
        <tr>
            <td align="center" width="300px" bgcolor="#FFE1AB">菜單</td>
            <td align="center" width="300px" bgcolor="#ABFFAB">金額</td>
            <td align="center" width="300px" bgcolor="#00FFFF">圖片</td>
            <td align="center" width="300px" bgcolor="#DBABFF">修改</td>
            <td align="center" width="300px" bgcolor="#FFABAB">刪除</td>
        </tr>

        <?php
        $num=count($menu_kind_echo);
        for($k=0;$k<=$num-1;$k++) {
            ?>
            <tr>
                <?php
                foreach ($menu_kind_echo[$k] as $i){ ?>
                <td align="center"><?php echo $i; ?></td>
                    <?php
                }
                foreach ($menu_unitprice_echo[$k] as $i){ ?>
                <td align="center"><?php echo $i; ?></td>
                    <?php
                }
                foreach ($menu_pic_echo[$k] as $i){ ?>
                <td align="center"><img src="photo/<?php echo $i; ?>" width="150" height="150"></td>
                    <?php
                }
                foreach ($menu_num_echo[$k] as $i){ ?>
                <td align="center"><a href="menu_update_index.php?num1=<?php echo $i; ?>&restname1=<?php echo $restname; ?>"><img src="icon/pencil.jpeg" width="30" height="30"></a></td>
                    <?php
                }
                foreach ($menu_num_echo[$k] as $i){ ?>
                <td align="center"><a href="controller/menu_controller.php?action=delete&restname=<?php echo $restname; ?>&num1=<?php echo $i; ?>"><img src="icon/x.jpeg" width="30" height="30"></a></td>
                    <?php
                } ?>
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