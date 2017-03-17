<?php
include ('test2.php');
index();
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title></title>
</head>
<body>

extends('layout')

@section('content')

<h1><?php echo $name; ?></h1>
<?php foreach ($zoo as $value){ ?>
    <h2> <?php echo $value; ?> </h2>
<?php } ?>

@stop

</body>
</html>