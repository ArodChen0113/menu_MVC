<?php
session_start();
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>餐廳系統</title>
</head>
<body>
<form name="rest_open" action="controller/restaurant_controller.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="3" align="center" bgcolor="#FFABAB">今日開餐</td>
        </tr>
        <tr>
            <td align="center"></td>
            <td align="center" bgcolor="#FFE1AB">分類</td>
            <td align="center" bgcolor="#ABFFAB">餐廳名稱</td>
        </tr>
        <tr>
            <td>請選擇今日開餐餐廳：</td>
            <td><select style="width:240px" name="kind1" onchange="window.location='controller/rest_kind_controller.php?action=control1&select1='+this.value">
                    <option value=""><?php
                        if($_GET['select1']!=NULL){
                            echo $_GET['select1'];
                        }else{
                            echo "請選擇"; } ?>
                    </option>
                    <?php
                    $num=count($sel_restkind);
                    for ($k=0;$k<=$num;$k++){
                        foreach ($sel_restkind[$k] as $i){ ?>
                            　
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                        }}
                    ?>
                </select></td>
            <td><select style="width:240px" name="kind2" onchange="window.location='controller/rest_kind_controller.php?action=control2&select1=<?php echo $_GET['select1'];?>&select2='+this.value">

                    <option value=""><?php
                        if($_GET['select2']!=NULL){
                            echo $_GET['select2'];
                        }else{
                            echo "請選擇"; } ?>
                    </option>
                    <?php
                    $sel_restname=$_SESSION['rest_name'];
                    $num=count($sel_restname);
                    for ($k=0;$k<=$num;$k++){
                        foreach ($sel_restname[$k] as $i){ ?>
                            　
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php

                        }}
                    ?>
                </select></td>
        </tr>
    </table>
    <br>
    <input type="hidden" name="open_restName" value="<?php echo $_GET['select2']; ?>">
    <input type="hidden" name="action" value="update">
    選擇好餐廳，按下開餐按鈕 >>>
    <input type="submit" value="確定開餐">  <font color="#FF0000">今日開餐: <?php
        if($todayopen==NULL){
            echo "今日尚未開餐";
        }else{
        echo $todayopen;
        }?>
    </font>
    <br>
    <?php
    if($_GET['select2']!=NULL){
    ?>
    <table border="1">
        <tr>
            <td align="center" bgcolor="#FFD4D4">菜單: <?php echo $_GET['selname']; ?></td>
        </tr>
        <tr>
            <td><img src="photo/<?php echo $_GET['selpic']; ?>" width="800" height="600"></td>
        </tr>
    </table>
    <?php
    }
    ?>
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

<form name="rest_management" action="rest_update_index.php" method="post" enctype="multipart/form-data">
<table border="1">
    <tr>
        <td colspan="3" align="center" bgcolor="#DBABFF">餐廳管理</td>
    </tr>
    <tr>
        <td align="center"></td>
        <td align="center" bgcolor="#FFE1AB">分類</td>
        <td align="center" bgcolor="#ABFFAB">餐廳名稱</td>
    </tr>
    <tr>
        <td>請選擇欲瀏覽餐廳：</td>
        <?php
        $Rec_RestKind2=mysqli_query($db, "SELECT `rest_kind` FROM `restaurant_kind`");
        ?>
        <td><select style="width:240px" name="restc1" onchange="window.location='controller/rest_kind_select_controller.php?rest1='+this.value">
                <option value=""><?php
                    if($_GET['rest1']!=NULL){
                        echo $_GET['rest1'];
                    }else{
                        echo "請選擇"; } ?>
                </option>
                <?php
                $num=count($sel_restkind);
                for ($k=0;$k<=$num;$k++){
                    foreach ($sel_restkind[$k] as $i){ ?>
                        　
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                    }}
                ?>
            </select></td>
        <td><select style="width:240px" name="restc2" onchange="window.location='controller/rest_kind_select_controller2.php?rest1=<?php echo $_GET['rest1'];?>&rest2='+this.value">
                <option value=""><?php
                    if($_GET['rest2']!=NULL){
                        echo $_GET['rest2'];
                    }else{
                        echo "請選擇"; } ?>
                </option>
                <?php
                $sel_restname2=$_SESSION['rest_name2'];
                $num=count($sel_restname2);
                for ($k=0;$k<=$num;$k++){
                    foreach ($sel_restname2[$k] as $i){ ?>
                        　
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php

                    }}
                ?>
            </select></td>
    </tr>
</table>
<br>
<input type="hidden" name="select_restName" value="<?php echo $_GET['rest2']; ?>">
選擇好餐廳，按下搜尋按鈕 >>>
<input type="submit" value="瀏覽菜單">

</body>
</html>