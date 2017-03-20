<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>菜單系統</title>
</head>
<body>
<form action="controller/menu_controller.php" method="post" enctype="multipart/form-data">
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
        $num=count($menu_kind_echo);
        for($k=0;$k<=$num-1;$k++) {
        ?>
            <tr>
                <?php
                foreach ($menu_kind_echo[$k] as $i){ ?>
                <td><input type="text" name="kind" value="<?php echo $i; ?>"></td>
                    <?php
                }
                foreach ($menu_unitprice_echo[$k] as $i){ ?>
                <td><input type="text" name="price" value="<?php echo $i; ?>"></td>
                    <?php
                }
                foreach ($menu_pic_echo[$k] as $i) { ?>
                    <td align="center"><img src="photo/<?php echo $i; ?>" width="150"
                                            height="150"></td>
                    <?php
                }
                foreach ($menu_num_echo[$k] as $i) { ?>
                    <input type="hidden" name="num" value="<?php echo $i; ?>">
                    <?php
                }
                ?>
                <td><input type="file" name="menu_picture"></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br>
    <input type="hidden" name="restName" value="<?php echo $restname;?>">

    <input type="hidden" name="action" value="update">
    <input type="submit" value="確定修改">
    <input type="button" value="返回菜單瀏覽" onclick="self.location.href='menu_select_index.php?restname=<?php echo $restname; ?>'"/>
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

