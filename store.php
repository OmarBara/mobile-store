<?php
/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 01/01/2018
 * Time: 11:39 PM
 *
 */
session_start();


include "functions.php";
include "header.php";
include 'classes.php';
?>

<body>

<div class="container">
    <?php
    //function to { read category file} $$ { phonexx file }
    $category_content = file_get_contents("categories.txt");
    $singleCategory =explode("\n",$category_content);
    //call function display item
    $counter =0;
    $co=count($singleCategory);
    //populate the (index.php)
    foreach ( $singleCategory as $item )
    { $co--;
    if (isset($item[0]))
    {
        $elements = explode(",", $item);
        $id= $elements[0];
        $name=$elements[3];
        $imagePath =$elements[1];
        $filePath=$elements[2];

        $Category= new Category($id,$name,$imagePath,$filePath);

    //call function search for match id and return price & color
        $arr= find_phone_info($filePath,$id);
        $price=$arr[1];
        $color=$arr[0];
        $sale=$arr[2];//chek if there is a Sale??????
        if ($sale=='sale'){$sale=.3*$price;}else $sale=0;

       $Category->setColor($color);
       $Category->setPrice($price);
       $Category->setSale($sale);

     /*function to display 3 item in each rows*/
if ($counter ==2 ){echo $Category->outputTable();
    $counter=0;
    echo '</div><div><br><br><br><hr width="50%" size=".9">';}

else if ($counter==0){ echo '<div class="row" >';echo $Category->outputTable();
        $counter++;}

else if ($counter==1 ){echo $Category->outputTable();$counter++;
     }
else if (($counter==0 || $counter=1) && ($co==1)){echo '</div>';}
    }
    }
    echo '</div>'
 ?>

</div>
<br><br>
</body>
<?php include 'footer.php';
?>