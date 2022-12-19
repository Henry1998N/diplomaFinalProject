<?php
include "db_connect.php";
if(!isset($_SESSION['count'])){
	$_SESSION['count']=0; 
}
$lecturersquery='SELECT * FROM lecturer';
$result = mysqli_query($conn,$lecturersquery);

if(!empty($_POST['email'])&&!empty($_POST['id'])){
	$email = $_POST['email'];
    $id = $_POST['id']; 
	while($row = mysqli_fetch_array($result)){
		$U = $row['email'];
		$P = $row['id'];
		if($email != $U && $id!=$P){
            header('Refresh: 1;URL = grades.php');
			$_SESSION['count']++;
			if($_SESSION['count']==3){
                echo "hi3";

				header('Refresh: 1;URL = loading.php');
			}
			
		}
		else if($email == $U&&$id!=$P){
            echo "hi1";

			header('Refresh: 1;URL = lecturer_login.php');
			echo "error in your password please try again";
		}
		
		else if($email == $U&&$id==$P){
            echo "hi lect";
			$_SESSION['idlecturer'] = $row['id']; 
			header('Refresh: 1;URL = HomePage.php');
		}
	}

}
else{
	echo "please enter values in the input text";
	header('Refresh: 10;URL = lecture_login.php');
}

?>