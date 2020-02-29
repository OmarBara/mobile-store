<?php

/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 09/01/2018
 * Time: 06:08 PM
 */
include 'header.php';
include 'functions.php';
include 'classes.php';


    if (isset($_GET['number']) && !empty($_GET['number'])) {
        $id = $_GET['number'];
        // Change Status to Served
        changeStatus($id);
    }

    if (isset($_GET['order']) && !empty($_GET['order'])) {
        //function to delete line
        $id = $_GET['order'];

        deleteAdmin($id);
    }

    display_admin();

// admin control panel
// change order status

    echo '<div class="container" style="border-top:solid #ccc;border-bottom:solid #ccc .8px ;margin: 15px;">
  <h3>Admin Control Panel</h3>
  <form class="form-horizontal" action="admin.php" method="get">
    <div class="form-group">
      <label class="control-label col-sm-3" for="number">Change Status to Served :</label>
      <div class="col-sm-3">
        <input type="number" class="form-control"  placeholder="Enter order No#" name="number">
      </div></div>';
    echo '<div class="form-group">        
      <div class="col-sm-offset-3 col-sm-4">
        <button type="submit" class="btn btn-default btn-success">Change</button>
      </div></div></form></div>';


//delete order
    echo '<form class="form-horizontal" action="admin.php" method="get">
    <div class="form-group">
      <label class="control-label col-sm-3" for="order">Delete an order :</label>
      <div class="col-sm-3">
        <input type="number" class="form-control"  placeholder="Enter order No#" name="order">
      </div></div>';
    echo '<div class="form-group">        
      <div class="col-sm-offset-3 col-sm-4">
        <button type="submit" class="btn btn-default btn-success">Delete</button>
      </div></div></form>';

?>
<?php include 'footer.php';?>
