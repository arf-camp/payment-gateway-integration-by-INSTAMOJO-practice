<?php 
session_start();
echo $_SESSION['TID']; echo "<br/>"; //for getting id ......
echo '<pre>';

print_r($_REQUEST);

 ?>




<!--  output of redirect:


 65107ce5da484a139e5df80616a46cb5
Array
(
    [payment_id] => MOJO1521T05A73279514
    [payment_status] => Credit
    [payment_request_id] => 65107ce5da484a139e5df80616a46cb5
) -->