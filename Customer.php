<?php
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

?>