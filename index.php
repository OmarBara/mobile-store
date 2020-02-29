<?php
/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 01/01/2018
 * Time: 01:59 PM
 */
session_start();
$_SESSION["counter"] =0;
$_SESSION['invoice']=array();


include 'header.php';
?>
<html>

<body>
<div class="space">
    <h1>Buy Mobile Phone Online</h1>
    <p class="lead">
        Mobile Phones have become the most used devices in our lives.
        It is amazing how much work one can do directly from their mobile phones. Manufacturers keep adding new
        & innovative features in mobile phones every year to enable a Mobile Phone user to easily use mobile apps
        to get their work done more easily.
        our store provide you the newest phones withe best prices online<p style='color:red;'></p>
    <p><a href="store.php" class="">Start Shopping &raquo;</a></p>

</div>
</body>
<?php include 'footer.php';?>
</html>

