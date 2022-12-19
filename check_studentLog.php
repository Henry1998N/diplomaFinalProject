<?php
include 'db_connect.php';
// write query for users 
$sql = 'SELECT * FROM students';
///make query & get result 
$result = mysqli_query($conn,$sql);
$cnt=0;
$cnt1=0;
if(!isset($_SESSION['lastName'])){
    $_SESSION['lastName']="";}
if(!isset($_SESSION['studentImg'])){
        $_SESSION['studentImg']="";}
if(!isset($_SESSION['phone'])){
        $_SESSION['phone']="";}
if(!isset($_SESSION['email'])){
            $_SESSION['email']="";}           
if(!isset($_SESSION['firstName'])){
    $_SESSION['firstName']="";}
if(!(isset($_SESSION["counter_load1"]))){
    $_SESSION["counter_load1"]=0;}
if(isset($_POST['email'])){
  if(isset($_POST['pass'])){ 
    while($r=mysqli_fetch_array($result)){
        if($r['email']==$_POST['email'] && $r['password']==$_POST['pass']){
            $_SESSION["studentId"]=$r['id'];
            $_SESSION["firstName"]=$r['firstName'];
            $_SESSION['lastName']=$r['lastName']; 
            $_SESSION['phone']=$r['phone'];
            $_SESSION['email']=$r['email'];
            $_SESSION['studentId']=$r['id'];
            $_SESSION['studentImg']=$r['studentImg'];
        // if(isset($_POST["check"])){
        //     setcookie('Email',$_SESSION['Email1'],time() +100000);
        //     setcookie('Password',$r['Password'],time() +100000);
        // }
        // else{
        //     setcookie('Email','',time() +100000);
        //     setcookie('Password','',time() +100000);

        // }
        header("Location:HomePage.php");
        }
        else if($r['email']==$_POST['email'] && $r['password']!=$_POST['pass']){
            $cnt1++;
        }
        else{
            $cnt++;
        }
    }
}
}
if($cnt==mysqli_num_rows($result)){
    echo "Your information does not exist please sign up";
    header("Refresh:2;url=student_login.php");
}

if($cnt1==1){
    
    $_SESSION["email"]=$_POST['email'];
    $sqlemail = "SELECT * FROM students WHERE email = '".$_SESSION["email"]."'";
    $rs = mysqli_query($conn ,$sqlemail);
    $re=mysqli_fetch_array($rs);
    $passs=$re['password'];
    if($passs!=$_POST['pass']){
        $_SESSION["counter_load1"]++;
        header("Location:student_login.php");
    }
}
if($_SESSION["counter_load1"]==3){
    $_SESSION["counter_load1"]=0;
    include "functions.php";
    $x=gRndStr(10);
    $_SESSION["password1"]=$x;
    $_SESSION['firstName']=$re['firstName'];
    $update = mysqli_query($conn ,"UPDATE students set Password= '".$_SESSION["password1"]."' where email ='".$_SESSION["email"]."'");
    header("Location:mail.php");
}

?>