<?php
$con = mysqli_connect("localhost","root","","feras");
if(mysqli_connect_errno())
{
	echo "falied";
}
$result = mysqli_query($con,"select * From manager");
//$email = $_POST['email'];
//$is = $_POST['id'];
if(!empty($_POST['email'])&&!empty($_POST['id'])){
    
}
else{
    
}

?>