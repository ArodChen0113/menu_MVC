<?php
include ("menu_js.js");
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>下單系統</title>
</head>
<body>
<form action="controller/order_controller.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td colspan="4" align="center" bgcolor="#ABFFFF">下單區</td>
        </tr>
        <tr>
            <td align="center" width="50px" bgcolor="#FFE1AB">訂購項目</td>
            <td align="center" width="100px" bgcolor="#ABFFAB">單價</td>
            <td align="center" width="100px" bgcolor="#DBABFF">圖片</td>
            <td align="center" width="30px" bgcolor="#FFABAB">訂購人</td>
        </tr>
        <tr>  <!--選單一-->
            <td><select style="width:240px" name="kind1" onchange="window.location='controller/menu_order_controller.php?&select1='+this.value">
                    <option value=""><?php
                        if($_GET['select1']!=NULL){
                            echo $_GET['select1'];
                        }else{
                            echo "請選擇"; } ?>
                    </option>

                    <?php
                    $num=count($today_menu);
                    for ($k=0;$k<=$num;$k++){
                    foreach ($today_menu[$k] as $i){ ?>
                        　
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php

                    }}
                    ?>
                </select></td>
            <td width="10%" align="center"><?php echo $_GET['price1'];?></td>
            <td align="center">
                <?php if($_GET['select1']!=NULL){ ?>
                    <img src="photo/<?php echo $_GET['pic1']; ?>" width="150" height="150">
                <?php } ?>
            </td>
            <td><input type="text" name="orderName" value="請填入訂購者姓名" onfocus="cleartext(this)" onblur="resettext(this)"></td>
        </tr>

        <tr>  <!--選單＝-->
            <td><select style="width:240px" name="kind2" onchange="window.location='controller/menu_order_controller.php?&select1=<?php echo $_GET['select1'];?>&select2='+this.value">
                    <option value=""><?php
                        if($_GET['select2']!=NULL){
                            echo $_GET['select2'];
                        }else{
                            echo "請選擇"; } ?>
                    </option>
                    <?php
                    $num=count($today_menu);
                    for ($k=0;$k<=$num;$k++){
                        foreach ($today_menu[$k] as $i){ ?>
                            　
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php

                        }}
                    ?>
                </select></td>
            <td width="10%" align="center"><?php echo $_GET['price2'];?></td>
            <td align="center">
                <?php if($_GET['select2']!=NULL){ ?>
                    <img src="photo/<?php echo $_GET['pic2']; ?>" width="150" height="150">
                <?php } ?>
            </td>
            <td></td>
        </tr>

        <tr>  <!--選單三-->
            <td><select style="width:240px" name="kind3" onchange="window.location='controller/menu_order_controller.php?select1=<?php echo $_GET['select1'];?>&select2=<?php echo $_GET['select2'];?>&select3='+this.value">
                    <option value=""><?php
                        if($_GET['select3']!=NULL){
                            echo $_GET['select3'];
                        }else{
                            echo "請選擇"; } ?>
                    </option>
                    <?php
                    $num=count($today_menu);
                    for ($k=0;$k<=$num;$k++){
                        foreach ($today_menu[$k] as $i){ ?>
                            　
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php

                        }}
                    ?>
                </select></td>
            <td width="10%" align="center"><?php echo $_GET['price3'];?></td>
            <td align="center">
                <?php if($_GET['select3']!=NULL){ ?>
                    <img src="photo/<?php echo $_GET['pic3']; ?>" width="150" height="150">
                <?php } ?>
            </td>
            <td></td>
        </tr>

        <tr>  <!--選單四-->
            <td><select style="width:240px" name="kind4" onchange="window.location='controller/menu_order_controller.php?select1=<?php echo $_GET['select1'];?>&select2=<?php echo $_GET['select2'];?>&select3=<?php echo $_GET['select3'];?>&select4='+this.value">
                    <option value=""><?php
                        if($_GET['select4']!=NULL){
                            echo $_GET['select4'];
                        }else{
                            echo "請選擇"; } ?>
                    </option>
                    <?php
                    $num=count($today_menu);
                    for ($k=0;$k<=$num;$k++){
                        foreach ($today_menu[$k] as $i){ ?>
                            　
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php

                        }}
                    ?>
                </select></td>
            <td width="10%" align="center"><?php echo $_GET['price4'];?></td>
            <td align="center">
                <?php if($_GET['select4']!=NULL){ ?>
                    <img src="photo/<?php echo $_GET['pic4']; ?>" width="150" height="150">
                <?php } ?>
            </td>
            <td></td>
        </tr>

        <tr>  <!--選單五-->
            <td><select style="width:240px" name="kind5" onchange="window.location='controller/menu_order_controller.php?select1=<?php echo $_GET['select1'];?>&select2=<?php echo $_GET['select2'];?>&select3=<?php echo $_GET['select3'];?>&select4=<?php echo $_GET['select4'];?>&select5='+this.value">
                    <option value=""><?php
                        if($_GET['select5']!=NULL){
                            echo $_GET['select5'];
                        }else{
                            echo "請選擇"; } ?>
                    </option>
                    <?php
                    $num=count($today_menu);
                    for ($k=0;$k<=$num;$k++){
                        foreach ($today_menu[$k] as $i){ ?>
                            　
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php

                        }}
                    ?>
                </select></td>
            <td width="10%" align="center"><?php echo $_GET['price5'];?></td>
            <td align="center">
                <?php if($_GET['select5']!=NULL){ ?>
                <img src="photo/<?php echo $_GET['pic5']; ?>" width="150" height="150">
            <?php } ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFA1A1">總計</td>
            <?php
            $sum=$_GET["sum"]; //當前訂購總額
            ?>
            <td colspan="2" align="center"><?php echo $sum; ?></td>
        </tr>
    </table>
    <br>
    <input type="hidden" name="kind_p1" value="<?php echo $_GET['select1']; ?>">
    <input type="hidden" name="kind_p2" value="<?php echo $_GET['select2']; ?>">
    <input type="hidden" name="kind_p3" value="<?php echo $_GET['select3']; ?>">
    <input type="hidden" name="kind_p4" value="<?php echo $_GET['select4']; ?>">
    <input type="hidden" name="kind_p5" value="<?php echo $_GET['select5']; ?>">
    <input type="hidden" name="sum" value="<?php echo $sum; ?>">
    <input type="hidden" name="restname" value="<?php echo $rest_openName; ?>">
    <input type="hidden" name="action" value="insert">
    <input type="submit" value="送出訂單">
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