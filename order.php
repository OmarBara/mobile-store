<?php
session_start();
/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 19/01/2018
 * Time: 09:13 PM
 */
include 'functions.php';
include 'header.php';
include "Classes.php";



if (!empty($_SESSION)) {
    if (
        isset($_GET['firstname']) && !empty($_GET['firstname']) AND
        isset($_GET['lastname']) && !empty($_GET['lastname']) AND
        isset($_GET['select']) && !empty($_GET['select'])AND
        empty($_GET['address'])&& empty($_GET['city']))
    {

        $_SESSION["fname"] = $_GET['firstname'];
        $_SESSION["lname"] = $_GET['lastname'];
        $fname=$_SESSION["fname"];
        $lname=$_SESSION["lname"];

        $order = new order();
        $order->AddOrder($_SESSION['fname'], $_SESSION['lname']);

        echo "<h3>Mr.". $lname.' '.$fname.'</h3><p> Your have successful complete your order, and your Bill is:</p>';

        $order->invoice_display($_SESSION['invoice']);
        $order->changeStockQty($_SESSION['invoice']); //change the quantity in stock
        $order->endSession();

         echo    '<br><div class="container"><div class="jumbotron"><h2>Shop Information</h2><address><strong>Address</strong>
                <br> Libya , janzoor ,Libyan Academi.<br></address><address><abbr title="Phone">P:</abbr>
    (+218) 021xxxxx <br> <abbr title="Email">E:</abbr> <a href="mailto:#"><i class="fa fa-envelope-o"></i> info@onlinestore.ly</a>
            </address><hr width="50%" size="30">
            <h5>Working Time</h5>
    Saturday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	9:30am - 5:00pm<br>
            Sunday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	    9:30am - 5:00pm<br>
            Monday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	9:30am - 5:00pm<br>
            Tuesday	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9:30am - 5:00pm<br>
            Wednesday	9:30am - 5:00pm<br>
            Thursday	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9:30am - 5:00pm<br>
            Friday	Closed</div></div><br>'
    ;
        echo '<div class="container"><div class="well text-center"><h3 style="color:mediumvioletred">
    Your Order is ready for you to pickup.<br>Thanks for Shopping at online store we hope to see you soon.  </h3></div></div><div class="row"> <div class="col-6">ss</div></div>';



    } //empty session
    else if (isset($_GET['firstname']) && !empty($_GET['firstname']) AND
        isset($_GET['lastname']) && !empty($_GET['lastname']) AND
        isset($_GET['address']) && !empty($_GET['address']) AND
        isset($_GET['city']) && !empty($_GET['city']) AND
        isset($_GET['ph']) && !empty($_GET['ph']) AND
        isset($_GET['select']) && !empty($_GET['select'])) {

        $_SESSION["fname"] = $_GET['firstname'];
        $_SESSION["lname"] = $_GET['lastname'];
        $address = $_GET['address'];
        $city = $_GET['city'];
        $phone = $_GET['ph'];
        $fname=$_SESSION["fname"];
        $lname=$_SESSION["lname"];

        $order = new order();
        $order->AddOrder($_SESSION['fname'], $_SESSION['lname'], $address);

        echo "<p>Mr.". $lname.' '.$fname.'</p><p> Your have successful complete your order, and your Bill is:</p>';

        $order->invoice_display($_SESSION['invoice']);
        $order->changeStockQty($_SESSION['invoice']); //change the quantity in stock
        $order->endSession();
        echo '<div class="container"><div class="well text-center"><h3 style="color:mediumvioletred">
   Your Order is Cumming to you soon.<br>Thanks for Shopping at online store we hope to see you soon.</h3></div></div><div class="row"> <div class="col-6">ss</div></div>';
    }
    // inter personal info

}
else
{
    echo '<div class="container"><div class="well text-center"><p style="color:red"><strong>
         "Warning" Your Session is over </strong></p></div></div><div class="row"> <div class="col-6">ss</div>';
    echo '</div> <div class="alert alert-danger text-center">
         <strong>Error!</strong> Your setion is expired plesse return to <a href="index.php">Here</a> .
         </div></div>';
}


echo '</body>';
 include 'footer.php';