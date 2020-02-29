<?php
/**
 * Created by PhpStorm.
 * User: OMAR BARA
 * Date: 30/12/2017
 * Time: 09:04 PM
 */
/*id, name, path of a category image file, path of its phone-xxx file products.*/


/*Category, Customer, Phone, order, Cart*/

class Category
{
    public $id;
    public $imagePath;
    public $filePath;
    public $name;
    public $price;
    public $color;
    public $sale;


    function __construct($id,$name,$imagePath,$productPath,$price=0,$color='',$sale=0,$amount=null){
        $this->id=$id;
        $this->name=$name;
        $this->imagePath=$imagePath;
        $this->filePath=$productPath;
        $this->price=$price;
        $this->color=$color;
        $this->sale=$sale;
        $this->amount=$amount;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getCat() { return $this->imagePath; }
    public function getProd() { return $this->filePath; }
    public function getPrice() { return $this->price; }
    public function getColor() { return $this->color; }
    public function getSale() { return $this->sale; }
    public function getAmount() { return $this->amount; }


    public function setId($id) { $this->id = $id; }
    public function setName($name) { $this->name = $name; }
    public function setCat($imagePath) { $this->imagePath = $imagePath; }
    public function setProd($productPath) { $this->filePath = $productPath; }
    public function setPrice($price) { $this->price = $price; }
    public function setColor($color) { $this->color = $color; }
    public function setSale($sale) { $this->sale = $sale; }
    public function seAmount($amount) { $this->amount = $amount; }



    public function outputTable()
    {
        $file= '<div class="col-sm-4"><div class="gallery nd">';
        $file.= '<a target="_blank" href="cart.php?id='.$this->id.'&pth='.$this->filePath.'" > 
            <img src='.$this->imagePath.' ></a>';
        if ($this->sale==0){$file.= '<div class="desc">'.$this->name.' <br >Price: '.$this->price.'$<br>Color: '.$this->color;}
        else {$file.= '<div class="desc">'.$this->name.' <br>Price: <strike> '.$this->price.'$</strike><br>Color: '.$this->color;}

        if ($this->sale!==0 ){$file.= '<br><h4 style="color: #AA0000">'.'sale:'.$this->sale.'$</h4></div></div></div>'; }
        else {$file.='</div></div></div>';}
        return $file;

    }
    public function cartDisplayy(){

    echo '<div class="container-fluid"><div class="row"><div class="col-sm-4">';
    echo '<a target="_blank" href="' . $this->imagePath . '"><img src=' . $this->imagePath . ' style="width:100%;
    height: auto;"></a></div>';

    ?>

    <div class="col-sm-3"></div>
    <div class="col-sm-5">
        <div class="panel panel-default text-center">
            <div class="panel-heading">
                <h1><?php if ($this->sale!==0 )echo '<h3 style="color: red;">..$ Sale $..</h3>
<h3 style="color: #AA0000"> $$Best Price Online$$ </h3>';?></h1>
            </div>
            <div class="panel-body">
                <p><strong><?php echo '<h3>'.$this->name.'</h3>'; ?></strong></p>
                <p><strong><?php echo '<h4>Color: '.$this->color.'</h4>'; ?></strong></p>
            </div>

<?php
    }

}

class Customer
{
    public $fname;
    public $lname;
    public $address;



    function __construct($fname,$lname,$address){
        $this->fname=$fname;
        $this->lname=$lname;
        $this->address=$address;

    }

    function addCostumer () {
        $costumer =$this->fname.','.$this->lname.','.$this->address;
        $myfile = fopen("costumers.txt", "a+") or die("Unable to open file!");
        fputs($myfile, $costumer.",\n");
        fclose($myfile);

    }

}
class Phone {//1,iphone X 64G,pictures/iphonex.jpg,10,Red,1000,sale,
    public $id;
    public $name;
    public $imagePath;
    public $qty;
    public $color;
    public $price;
    public $sale;



    function __construct($id,$name,$imagePath,$qty,$color,$price,$sale){
        $this->id=$id;
        $this->name=$name;
        $this->imagePath=$imagePath;
        $this->qty=$qty;
        $this->color=$color;
        $this->price=$price;
        $this->sale=$sale;

    }
}

class order{

public $color;
public $model;
public $price;
public $qty;

    function  AddOrder($fname,$lname,$address='At Shop')
    {
        $txt=$fname.','.$lname.','.$address;

        $newCustomer =new Customer($fname,$lname,$address='At Shop');
        $newCustomer->addCostumer();

        $txt.=',not served,|';
        $totalPrice=0;
        foreach ($_SESSION['invoice'] as $key=>$value)
        {
            $color= $value[0];
            $sale=$value[2];
            $model=$value[3];
            $price=$value[1];
            $qty=$value[8];
            if ($sale=='sale'){$price*=.3;}
            $totalPrice+=$price*$qty;
            $txt.=$model.','.$color.','.$qty.','.$price.'|';
        }
        $txt.=$totalPrice;
        $myfile = fopen("order.txt", "a+") or die("Unable to open file!");
        fputs($myfile, $txt."\n");
        fclose($myfile);
        //$_SESSION = array();
    }

    function changeStockQty($invoice)
    {
        $qty=0;
        $nuOfNtServedLine = 0;
        $nuOfLine = 0; // real line number in txt
        $linenumber = 0;
        $combareLine = '';
        foreach ($invoice as $key=>$data)
        { $price = $data[1];
            $color = $data[0];
            $sale = $data[2];//chek if there is a Sale??????
            $name = $data[3];
            $imagePath = $data[4];
            $amount = $data[5];
            $idd=$data[6];
            $filePath=$data[7];
            $qty=$data[8];

            $nuOfLine = 0;
            $fileContents = file_get_contents($filePath);
            $txt = explode("\n", $fileContents);
            foreach ($txt as $line) {
                if (isset($line[0])) {
                    $value = explode(",", $line);
                    $nuOfLine++;
                    if ($value[0] ==$idd )
                    {
                        $linenumber = $nuOfLine; //line number
                        $combareLine = $line; //the line
                        // break;
                    }
                }
            }


            $tst=explode(',',$combareLine);
            if(isset($tst[3])){//echo '<be>qty'.$qty.' amount'.$amount;
                $tst[3]=($amount-$qty);}

            $convertedLine=implode(',',$tst);

            $txt[$linenumber-1]=$convertedLine;
            $myfile = fopen($filePath, "w") or die("Unable to open file!");
            foreach ($txt as $tx)
            {if (isset($tx[1]))
                fputs($myfile, $tx."\n");}
            fclose($myfile);
        }}


    function invoice_display($SESSION)
    {
        $total=0;
        echo '<br><table class="table table-hover" ><thead><tr><th>#</th><th>Model</th><th>Color</th>
              <th>Price/item</th><th>QTY</th><th>Total Price</th></tr></thead>';
        foreach ($SESSION as $key=> $value){
            if ($value[2]=='sale'){$value[1]*=.3;}else {$value[2]=0;}
            echo '<tbody><tr><td>'.++$key.'</td>';//"Value= ". $value.'<br>';
            echo  "<td>". $value[3].'</td><td>'.$value[0].'</td><td>'.$value[1].'
           </td><td>'.$value[8].'</td><td>'.$value[1]*$value[8].'$</td></tr></tbody>';
            $total+=$value[1]*$value[8];
        }
        echo '<tfoot><tr><td colspan="5" align="center">Total Price</td><td>'.$total.'$</td></tr></tfoot></table>';
        // echo $total;

    }


    function endSession()
    {
        $_SESSION = array();
    }
}

class Cart
{

    public $id;
    public $imagePath;
    public $filePath;
    public $name;
    public $price;
    public $color;
    public $sale;


    function __construct($id, $name, $imagePath, $productPath, $price = 0, $color = '', $sale = 0, $amount = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->imagePath = $imagePath;
        $this->filePath = $productPath;
        $this->price = $price;
        $this->color = $color;
        $this->sale = $sale;
        $this->amount = $amount;
    }


    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getCat() { return $this->imagePath; }
    public function getProd() { return $this->filePath; }
    public function getPrice() { return $this->price; }
    public function getColor() { return $this->color; }
    public function getSale() { return $this->sale; }
    public function getAmount() { return $this->amount; }


    public function setId($id) { $this->id = $id; }
    public function setName($name) { $this->name = $name; }
    public function setCat($imagePath) { $this->imagePath = $imagePath; }
    public function setProd($productPath) { $this->filePath = $productPath; }
    public function setPrice($price) { $this->price = $price; }
    public function setColor($color) { $this->color = $color; }
    public function setSale($sale) { $this->sale = $sale; }
    public function seAmount($amount) { $this->amount = $amount; }


public function cartDisplay()
{

echo '<div class="container-fluid"><div class="row"><div class="col-sm-4">';
echo '<a target="_blank" href="' . $this->imagePath . '"><img src=' . $this->imagePath . ' style="width:100%;
    height: auto;"></a></div>';
?>
            <div class="col-sm-3"></div>
            <div class="col-sm-5">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1><?php if ($this->sale!==0 )echo '<h3 style="color: red;">..$ Sale $..</h3>
<h3 style="color: #AA0000"> $$Best Price Online$$ </h3>';?></h1>
                    </div>
                    <div class="panel-body">
                        <p><strong><?php echo '<h3>'.$this->name.'</h3>'; ?></strong></p>
                        <p><strong><?php echo '<h4>Color: '.$this->color.'</h4>'; ?></strong></p>
                    </div>

                    <?php

     }
}
