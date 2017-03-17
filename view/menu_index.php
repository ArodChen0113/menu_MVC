<?php
include ("menu_js.js");
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>訂購系統</title>
</head>
<body>
<form action="controller/menu_add.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="4" align="center" bgcolor="#FFABFF">新增餐廳Menu</td>
        </tr>
        <tr>
            <td colspan="4" align="center" bgcolor="#ABFFFF">餐廳</td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFABAB">餐廳名稱</td>
            <td align="center" bgcolor="#FFE1AB">餐廳電話</td>
            <td align="center" bgcolor="#DBABFF">餐廳分類</td>
            <td align="center" bgcolor="#ABFFAB">上傳菜單圖片</td>
        </tr>
        <tr>
            <td><input type="text" name="restaurant_name" value="請填入餐廳名稱" onfocus="cleartext(this)" onblur="resettext(this)"></td>
            <td><input type="text" name="rest_tel"></td>
            <td><select name="restkind">
                    <?php
                    $num=count($rest_kind_echo);
                    for($k=0;$k<=$num-1;$k++) {
                        foreach ($rest_kind_echo[$k] as $i){ ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                        }
                    }?>
                </select></td>
            <td><input type="file" name="rest_picture" size="30"></td>
        </tr>
    </table>

<table border="1">
    <tr>
        <td colspan="4" align="center" bgcolor="#A3A3FF">菜單</td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFB5B5">項目</td>
        <td align="center" bgcolor="#FFE5B5">單價</td>
        <td align="center" bgcolor="#DBABFF">上傳料理圖片</td>
    </tr>
    <tr>
        <td><input type="text" name="kind[]"></td>
        <td><input type="text" name="price[]"></td>
        <td><input type="file" name="menu_picture[]" size="30"></td>
    </tr>
    <tr>
        <td><input type="text" name="kind[]"></td>
        <td><input type="text" name="price[]"></td>
        <td><input type="file" name="menu_picture[]" size="30"></td>
    </tr>
    <tr>
        <td><input type="text" name="kind[]"></td>
        <td><input type="text" name="price[]"></td>
        <td><input type="file" name="menu_picture[]" size="30"></td>
    </tr>
    <tr>
        <td><input type="text" name="kind[]"></td>
        <td><input type="text" name="price[]"></td>
        <td><input type="file" name="menu_picture[]" size="30"></td>
    </tr>
    <tr>
        <td><input type="text" name="kind[]"></td>
        <td><input type="text" name="price[]"></td>
        <td><input type="file" name="menu_picture[]" size="30"></td>
    </tr>
    <tr>
        <td><input type="text" name="kind[]"></td>
        <td><input type="text" name="price[]"></td>
        <td><input type="file" name="menu_picture[]" size="30"></td>
    </tr>
    <tr>
        <td><input type="text" name="kind[]"></td>
        <td><input type="text" name="price[]"></td>
        <td><input type="file" name="menu_picture[]" size="30"></td>
    </tr>
    <tr>
        <td><input type="text" name="kind[]"></td>
        <td><input type="text" name="price[]"></td>
        <td><input type="file" name="menu_picture[]" size="30"></td>
    </tr>
    <tr>
        <td><input type="text" name="kind[]"></td>
        <td><input type="text" name="price[]"></td>
        <td><input type="file" name="menu_picture[]" size="30"></td>
    </tr>
    <tr>
        <td><input type="text" name="kind[]"></td>
        <td><input type="text" name="price[]"></td>
        <td><input type="file" name="menu_picture[]" size="30"></td>
    </tr>
</table>
    <br>
    <input type="hidden" name="action" value="insert">
    <input type="submit" value="新增菜單">
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