<?php
/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 30/12/2017
 * Time: 07:46 PM
 */

/*this file contain many functions*/


function invoice_display($SESSION)
{
    $total=0;
    echo '<br><table class="table table-hover" ><thead><tr><th>#</th><th>Model</th><th>Color</th>
              <th>Price/item</th><th>QTY</th><th>Total Price</th></tr></thead>';
    foreach ($SESSION as $key=> $value){
        echo '<tbody><tr><td>'.++$key.'</td>';

        echo  "<td>". $value[3].'</td><td>'.$value[0].'</td><td>'.$value[1].'
           </td><td>'.$value[6].'</td><td>'.$value[1] * $value[6].'$</td></tr></tbody>';
        $total+= $value[1] * $value[6];
    }
    echo '<tfoot><tr><td colspan="5" align="center">Total Price</td><td>'.$total.'$</td></tr></tfoot></table>';
}

//return Price and Color

function find_phone_info ($filePath, $id)
{
    $fileContent = file_get_contents("$filePath");
    $fileElements = explode("\n", $fileContent);

     foreach ($fileElements as $line)
     if (isset($line[2]))
         if ($line[0] == $id[0])
     {
        $tmp=explode(',', $line);
        if($tmp[0] == $id)
        {
        $name = $tmp[1];
        $imgPath = $tmp[2];
        $amount = $tmp[3];
        $color = $tmp[4];
        $price = $tmp[5];
        $sale = $tmp[6];

        return array($color, $price, $sale, $name, $imgPath, $amount);
        }
     }
}


function display_admin()
{
    $fileContents = file_get_contents("order.txt");
    $txt = explode("\n", $fileContents);

    $total = 0;
    $key = 0;
    echo '<br><table class="table table-hover" ><thead><tr><th>#</th><th>Buyer Name</th><th>Pickup Place</th>
              <th>#- Orderd Models</th><th>Status</th><th>Total Price</th></tr></thead>';
    foreach ($txt as $line){if (isset($line[0])){
        $value = explode(",", $line);
        $val = explode("|", $line);
        if ($value[3] == 'not served')
        {
            echo '<tbody><tr><td>'.++$key.'</td>';
            echo  "<td>". $value[0].' '.$value[1].'</td><td>'.$value[2].'</td><td>';
            for ($x = 1; $x < count($val) - 1; $x++)
            {echo $x.' - '.$val[$x].'<br>';}

            echo '</td><td xmlns="http://www.w3.org/1999/html">' .$value[3].'</td><td>'.$val[count($val)-1].'$</td></tr></tbody>';

        }}}
    echo '<tfoot><tr><td colspan="5" align="center">-----</td><td>......</td></tr></tfoot></table>';

}

function changeStatus($id){
    $nuOfNtServedLine = 0;
    $nuOfLine = 0; // real line number in txt
    $linenumber = 0;
    $combareLine = '';
    $fileContents = file_get_contents("order.txt");
    $txt = explode("\n", $fileContents);
    foreach ($txt as $line) {
        if (isset($line[0])) {
            $value = explode(",", $line);
            $nuOfLine++;
            if ($value[3] == 'not served') {
                $nuOfNtServedLine++;
                if ($id == $nuOfNtServedLine) {
                    $linenumber = $nuOfLine; //line number
                    $combareLine = $line; //the line
                    break;
                }
            }
        }
    }

    $tst=explode(',', $combareLine);
    if(isset($tst[3])) {
    $tst[3] = 'served';
    }
    $convertedLine=implode(',', $tst);

    $txt[$linenumber - 1] = $convertedLine;
    $myfile = fopen("order.txt", "w") or die("Unable to open file!");
    foreach ($txt as $tx) {
        if (isset($tx[1]))
        fputs($myfile, $tx."\n");
    }
    fclose($myfile);
}


function deleteAdmin($id)
{
    $nuOfNtServedLine = 0;
    $nuOfLine = 0; // real line number in txt
    $combareLine = '';
    $fileContents = file_get_contents("order.txt");
    $txt = explode("\n", $fileContents);
    foreach ($txt as $line) {
        if (isset($line[0])) {
            $value = explode(",",$line);
            $nuOfLine++;
            if ($value[3] == 'not served') {
                $nuOfNtServedLine++;
                if ($id == $nuOfNtServedLine) {
                    $linenumber = $nuOfLine; //line number
                    $combareLine = $line; //the line
                    break;
                }
            }
        }
    }

    $myfile = fopen("order.txt", "w") or die("Unable to open file!");

    foreach ($txt as $tx) {
        if (isset($tx[1]) && ($tx != $combareLine))
        fputs($myfile, $tx."\n");
    }
    fclose($myfile);

}

/*function display_Phone ($filePath,$id,$name,$imagePath,$price,$color,$sale)
{
     $file= '<div class="col-sm-4"><div class="gallery nd">';
    $file.= '<a target="_blank" href="cart.php?id='.$id.'&pth='.$filePath.'" >
            <img src='.$imagePath.' ></a>';
    $file.= '<div class="desc">'.$name.' <br >Price: '.$price.'$<br>color:'.$color;
    if ($sale!==0 ){$file.= '<br>'.'sale:'.$sale.'$</div></div></div>'; }
    else {$file.='</div></div></div>';}
    return $file;
}*/


/*function sale_display ($name,$imagePath,$price,$color,$sale)
{
    //add loop here
    $file= '<div class="gallery nd">';
    $file.= '<a target="_blank" href="'.$imagePath.'">
            <img src='.$imagePath.' ></a>';
    $file.= '<div class="desc">'.$name.' <br >color:'.$color.'<br>Price: '.$sale.'$ <small><strike>'.$price.'$</strike></small></div></div>';
    return $file;
}*/

/*function addCostumer($costumer)
{
    $myfile = fopen("costumers.txt", "a+") or die("Unable to open file!");
    fputs($myfile, $costumer.",\n");
    fclose($myfile);
}*/

/*function  AddOrder($fname,$lname,$address='At Shop')
{
    $txt=$fname.','.$lname.','.$address;
    addCostumer( $txt);
    $txt.=',not served,|';
    $totalPrice=0;
    foreach ($_SESSION['invoice'] as $key=>$value)
    {
        $color= $value[0];
        $model=$value[3];
        $price=$value[1];
        $qty=$value[6];
        $totalPrice+=$value[1]*$value[6];
$txt.=$model.','.$color.','.$qty.','.$price.'|';
        //costumer name {his order list}
    }
$txt.=$totalPrice;
    $myfile = fopen("order.txt", "a+") or die("Unable to open file!");
    fputs($myfile, $txt."\n");
    fclose($myfile);
    $_SESSION = array();
}*/

/*function cart_display ($name,$imagePath,$price,$color,$sale)
{
    //add loop here
    $file= '<div class="gallery nd">';
    $file.= '<a target="_blank" href="'.$imagePath.'">
            <img src='.$imagePath.' ></a>';
    $file.= '<div class="desc">'.$name.' <br >color:'.$color.'<br>Price: '.$sale.'$ <small><strike>'.$price.'$</strike></small></div></div>';

    return $file;
}*/

?>