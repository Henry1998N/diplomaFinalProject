<?php
//sesstion_start();
$con = mysqli_connect("localhost","root","","feras");
//$con = mysqli_connect("localhost","root","","feras");
if(mysqli_connect_errno())
{
	echo "falied";
}
if(!isset($_SESSION['count'])){
	$_SESSION['count']=0; 
}
$result = mysqli_query($con,"select * From lecturer");

if(!empty($_POST['email'])&&!empty($_POST['id'])){
	$email = $_POST['email'];
    $id = $_POST['id']; 
	while($row = mysqli_fetch_array($result)){
		$U = $row['email'];
		$P = $row['idNumber'];
		
		if($email != $U&&$id!=$P){
			header('Refresh: 1;URL = NotFound.php');
			$_SESSION['count']++;
			if($_SESSION['count']==3){
				header('Refresh: 1;URL = NotFound2.php');
			}
			
		}
		else if($email == $U&&$id!=$P){
			header('Refresh: 3;URL = loginLecturer.php');
			echo "error in your password please try again";
		}
		
		else if($email == $U&&$id==$P){
			header('Refresh: 1;URL = HomePage.php');
		}
	}

}
else{
	echo "please enter values in the input text";
	header('Refresh: 4;URL = loginLecturer.php');
}

?>