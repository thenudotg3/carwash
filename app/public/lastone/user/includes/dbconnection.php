<?php
$con=mysqli_connect("localhost", "root", "", "vsmsdb");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

  ?>
<!-- instead of local host we can use the relevant IP address if we are hosting-->
