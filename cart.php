<?php session_start();
/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 01/01/2018
 * Time: 12:53 PM
 */
include 'header.php';
include 'Classes.php';
?>
<body>
<?php
if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) AND isset( $_GET['pth'] ) && !empty( $_GET['pth'] )) {
    include "functions.php";
    $id = $_GET['id'];
    $filePath = $_GET['pth'];
    $arr = find_phone_info($filePath, $id);
    $price = $arr[1];
    $color = $arr[0];
    $sale = $arr[2];//chek if there is a Sale??????
    $name = $arr[3];
    $imagePath = $arr[4];
    $amount = $arr[5];
    $arr[6] = $id;
    $arr[7] = $filePath;
    if ($sale == 'sale') {
        $sale = .3 * $price;
    } else $sale = 0;

    $Cart= new Cart($id, $name, $imagePath, $filePath, $price, $color, $sale, $amount);
    $Cart->cartDisplay();

    ?>
            <div class="panel-footer">
                <h3><?php
                   if ($sale>0){
                     echo $sale.'$ <small><strike>'.$price.'$</strike></small>';}
                   else {echo $price.'$';}
                ?></h3>

                <form class="form-inline" action="invoice.php" method="get"><div class="form-group">
                        QTY<input type="number" name="qty" style="width: 35px; height:auto"></div>
                    <?php foreach($arr as $value)
                    {
                    echo '<input type="hidden" name="aldd[]" value="'. $value. '">';
                    } ?>
                    <div class="form-group mx-sm-3 " >
                    <button   type="submit" class="btn btn-primary btn-block " value="Add to Cart" >
                        <span class="glyphicon glyphicon-shopping-cart" ></span>Add to Shopping Cart
                    </button></div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php } ?>
</body>
<?php include 'footer.php'?>