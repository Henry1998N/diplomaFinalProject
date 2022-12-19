<?php 
require "db_connect.php";
if(isset($_POST['uploadbtn'])){
    $file=rand(100,10000)."-".$_FILES['file']['name'];
    $file_loc=$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];
    $file_size=$_FILES['file']['size'];
    $target = "uploads/".basename($file);
  
    $new_size=$file_size/2024;
    $new_file_name=strtolower($file);
    $final_file=str_replace('','-',$new_file_name);
    if(move_uploaded_file($_FILES['file']['tmp_name'],$target)){
        
        $sql1='INSERT INTO uploads(`file`,`type`,`size`) VALUES ("'.$final_file.'","'.$file_type.'","'.$new_size.'")';
        $sql='INSERT INTO `uploads`(`file`, `type`, `size`) VALUES ('.$final_file.',"1","1")';

       if (mysqli_query($conn,$sql1)){
        echo "good";
       }
       else{
        echo mysqli_error($conn);
       }
    }
}






?>