<?php
/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 01/01/2018
 * Time: 12:52 PM
 *
 * reducing its price by 30%.
 */

//add product on sale //
include "functions.php";
include 'header.php';
include 'Classes.php';
?>
<html>
<body>
<div class="container">

<?php
//function to { read category file} $$ { phonexx file }
$category_content = file_get_contents("categories.txt");
$singleCategory = explode("\n",$category_content);
//call function display item
$counter = 0;
foreach ( $singleCategory as $item ) {
    if (isset($item[0])) {
        $elements = explode(",", $item);
        $id = $elements[0];
        $name = $elements[3];
        $imagePath = $elements[1];
        $filePath = $elements[2];
        $Category = new Category($id,$name,$imagePath,$filePath);
            //call function search for match id and return price & color
        $arr = find_phone_info($filePath,$id);
        $price = $arr[1];
        $color = $arr[0];
        //chek if there is a Sale?
        $sale = $arr[2];
        if ($sale == 'sale') {
             // 30% sale
            $sale = 0.3 * $price;
            $Category->setColor($color);
            $Category->setPrice($price);
            $Category->setSale($sale);
            if ($counter == 2 ){
                echo $Category->outputTable();
                $counter = 0;
                echo '</div><div><br><hr width="50%" size=".9">';
            }else if ($counter == 0){ 
                echo '<div class="row" >'; echo $Category->outputTable();
                $counter++;
            }else if ($counter == 1){
                echo $Category->outputTable();$counter++;
            }else if (($counter ==0 || $counter = 1) && ($co == 1)){
                echo '</div>';
            }

        }
    }
}
    echo '</div>';
        /*function to display 3 item in each rows*/
        /*if ($counter ==3 ){  echo '</div><br><br><br><div>';$counter=0;echo '<div class="row" >';
            echo display_Phone($filePath,$id,$name, $imagePath, $price, $color,$sale);}

        else if ($counter==0){ /*add header echo '<div class="row" >';
            echo display_Phone($filePath,$id,$name, $imagePath, $price, $color,$sale);
            $counter++;}

        else {echo display_Phone($filePath,$id,$name, $imagePath, $price, $color,$sale);
            $counter++;
        }*/
?>
    </div>

</body>

<?php include 'footer.php'; ?>
</html>
