<?php
session_start();
$GLOBALS['fname']='';
$GLOBALS['lname']='';

include 'functions.php';
include 'header.php';
include "Classes.php";

/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 08/01/2018
 * Time: 01:51 PM
 */
?>
<body>
    <?php
if (!empty($_SESSION))
{
    if(isset($_GET['firstname']) && !empty($_GET['firstname']) AND
        isset($_GET['lastname']) && !empty($_GET['lastname']) AND
        isset($_GET['select']) && !empty($_GET['select']))
    {
        $_SESSION["fname"]  = $_GET['firstname'];
        $_SESSION["lname"] = $_GET['lastname'];
        $select = $_GET['select'];

        if ($select == 'atshop')
        {echo '<br><div class="container"><div class="jumbotron"><h2>Shop Information</h2><p><address>Address: tripoli Academi ,Janzor<br>Phone Nu: (218) 926011111<br> Work Time: daily 9:00Am -5:00 Pm</address></div></div><br>'.'&nbsp;';
            echo '<div class="container"><div class="well text-center"><h3 style="color:mediumvioletred">
   CONGRATULATION: Your Order is ready.<br>Thanks for Shopping at online store we hope to see you soon.  </h3></div></div><div class="row"> <div class="col-6">ss</div></div>';

        $order= new order();
        $order->AddOrder($_SESSION['fname'],$_SESSION['lname']);

        }

        else if ($select == 'address')
        {

           echo '<form class="form-horizontal" action="address.php" method="get">
    <div class="form-group">
      <label class="control-label col-sm-2" for="firstname">Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Address" name="addre" >
      </div></div>';

            echo '
    <div class="form-group">
      <label class="control-label col-sm-2" for="firstname">City:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Address" name="addd">
      </div></div>';

            echo '
    <div class="form-group">
      <label class="control-label col-sm-2" for="firstname">Phone No:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Address" name="add" >
      </div></div>';

echo '<div class="col-sm-offset-2 "><button type="submit" class="btn btn-success col-4">Submit</button></div>
</form>';

        }
    }
//else if address
else if (isset($_GET['addre']) && !empty($_GET['addre']))
    {$address=$_GET['addre'];
        $order= new order();
        $order->AddOrder($_SESSION['fname'],$_SESSION['lname'],$address);

    echo '<div class="container"><div class="well text-center"><h3 style="color:mediumvioletred">
   CONGRATULATION: Your Order is Cumming soon.<br>Thanks for Shopping at online store we hope to see you soon.</h3></div></div><div class="row"> <div class="col-6">ss</div></div>';}
   // inter personal info
    else {

        echo '<div class="container">
  <h2>Personal Information</h2>
  <form class="form-horizontal" action="order.php" method="get">
    <div class="form-group">
      <label class="control-label col-sm-2" for="firstname">First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter First Name" name="firstname" required>
      </div></div>';

        echo '<div class="form-group">
      <label class="control-label col-sm-2" for="lastname">Last Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Last Name" name="lastname" required>
      </div></div>';

        echo '<div class="form-group"><label class="control-label col-sm-2" for="country">Delivery:</label>
      <div class="col-sm-10"><select type="text" class="form-control" onchange="showHide(this.value)" name="select">
        <option value="atshop">Home delivery</option>
        <option value="address">Pick up ( At Shop )</option></select></div></div>';

        //added Strt
       echo '<div class="form-group" id="ad">
      <label class="control-label col-sm-2" for="address" >Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Address" name="address" id="add" required>
      </div></div>';

            echo '<div class="form-group" id="cty">
      <label class="control-label col-sm-2"  for="city">City:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Phone No"  name="city" id="ct" required>
      </div></div>';

            echo '<div class="form-group" id="pho">
      <label class="control-label col-sm-2" for="ph" >Phone No:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Address" name="ph" id="p" required>
      </div></div>';

        //aded END
     echo '<div class="form-group">        
      <div class="col-sm-offset-2 col-10">
        <button type="submit" class="btn btn-primary btn-block" >Submit</button>
      </div></div></form>';

     }}
 // Error Warning session expired
else
        {
         echo '<div class="container"><div class="well text-center"><p style="color:red"><strong>
         "Warning" Your Session is over </strong></p></div></div><div class="row"> <div class="col-6">ss</div>';
         echo '</div> <div class="alert alert-danger text-center">
         <strong>Error!</strong> Your setion is expired plesse return to <a href="index.php">Here</a> .
         </div></div>';
        }

    ?>


</body>
<?php include "footer.php";?>