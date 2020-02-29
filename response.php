<?php 
//get data
$fname = filter_input(INPUT_POST, 'fname');        
$lname = filter_input(INPUT_POST, 'lname');
$country = filter_input(INPUT_POST, 'country');
$phone = filter_input(INPUT_POST, 'phone');
$color = filter_input(INPUT_POST, 'color');

$order = $fname." ".$lname." ".$country." ".$phone." ".$color;

$old_content = file_get_contents("newfile.txt");
//open file
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, $order."||".$old_content);
$new_content = file_get_contents("newfile.txt");

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
<span> <?php echo htmlspecialchars($order);exit; echo '<img src="p8.jpg" >' //echo $new_content;fclose($myfile); ?>  </span> <!--to display all orers -->
<span>  </span>
<p>your oreder is done <p>
	<a href="page3.html">back</a>
 </body>
 </html>