<?php session_start();
include 'header.php';
include 'Classes.php';
?>
<body>
<?php
/**
 * User: OMAR BARA
 * Date: 01/01/2018
 * Time: 12:54 PM
 */

include "functions.php";
if (!empty($_SESSION)) {
    if (isset($_GET['qty']) && !empty($_GET['qty']) && ($_GET['qty'] > 0) AND 
       isset($_GET['aldd']) && !empty($_GET['aldd']) ) {
        $qty = 0;
        $qty = $_GET['qty'];
        $allData = $_GET['aldd'];

        ///error
        if ($qty < $allData[5]) {
            //create invoice
            $price = $allData[1];
            //$color = $allData[0];
            //chek if there is a Sale or not
            $sale = $allData[2];
            $name = $allData[3];
            $imagePath = $allData[4];
            $amount = $allData[5];
            if ($sale == 'sale') {
                $price = 0.3 * $price;
            } else $sale = 0;

            $id = $allData[6];
            $filePath = $allData[7];
            $allData[8] = $qty;
            $counter = $_SESSION["counter"];
            echo '<br><p>You have: ' . ++$counter . " Items In your Cart</p><br>";

            $_SESSION['invoice'][$_SESSION["counter"]] = $allData;
            $order = new order();
            $order->invoice_display($_SESSION['invoice']);

            $_SESSION["counter"]++;
            echo '<div class="row"><div class="col-6"> <a href="address.php" class="btn btn-primary btn-block " 
            role="button" ><h4>Approve invoice order</h4></a></div></div><br>' . '&nbsp;' . '<br>';


        } else {
            echo '<div class="container"><div class="well text-center"><p style="color:red"><strong>
            There is : '. $allData[5] .' left in stock </strong></p></div></div><div class="row"> <div class="col-6">ss</div>';
        }
    }else if (!empty($_SESSION['invoice'])) {
        invoice_display($_SESSION['invoice']);
        echo '<p style="text-align:center;font-size: 150%;">Approve invoice order
        <a href="address.php" style="border: 3px solid cadetblue;background: darkslategrey">Continue</a></p>';
   
    } else echo '<div class="container"><div class="well text-center"><p style="color:red"><strong> Empty Cart</strong></p></div></div>';

// Error Warning session expired
} else {
    echo '<div class="container"><div class="well text-center"><p style="color:red"><strong>
    "Warning" Your Session is over </strong></p></div></div><div class="row"> <div class="col-6">ss</div>';
    echo '</div> <div class="alert alert-danger text-center">
    <strong>Error!</strong> Your setion is expired plesse return to <a href="index.php">Here</a> .
    </div></div>';
 }
 ?>

</body>
<?php include 'footer.php';?>