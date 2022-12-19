    <style>
.div {
    direction: rtl;
}

.dir {
    margin-right: 10px;
    margin-top: 10px;
    margin-bottom: 10px;

}

.display {
    display: inline-block;
}


.font-showcase {
    margin-right: 10px;
    margin-top: 10px;
    border-radius: 5px;
    max-width: 250px;
    padding: 20px;
    background: white;
    box-shadow: 0px 2px 40px 0px rgba(65, 84, 111, 0.2);

    h2 {
        text-align: center;
        margin: 0;
        font-size: 80px;
    }

    span {
        display: block;
        font-size: 14px;
        color: #666;
    }

    h3 {
        text-align: center;
        margin: 0;
        font-size: 80px;
    }

}
    </style>
    <?php  
include "navbar.php";


?>
    <div dir="RTL">
        <center>

            <div class="dir">
                <form action="#" method="POST" class="div">
                    <span>סמסטר :</span>
                    <select name="semester" id="semester" class="div">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span>שנה :</span>
                    <select name="year" id="year">
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                    </select>
                    <input type="submit" name="refresh" id="" value="רענן">
                </form>
            </div>
        </center>
        <?php 
$semstr="";
$year="";
if(isset($_POST['semester']) && $_POST['semester']=="1" ){
    $semstr="1";
}


else if(isset($_POST['semester']) && $_POST['semester']=="2" ){
    $semstr="2";

   
}

else{}
if(isset($_POST['year']) && $_POST['year']=="2023"){
    $year="2023";
  
}
else if(isset($_POST['year']) && $_POST['year']=="2022"){
    $year="2022";
}
else if(isset($_POST['year']) && $_POST['year']=="2021"){
    $year="2021";
}
else if(isset($_POST['year']) && $_POST['year']=="2020"){
    $year="2020";
   
}
else if(isset($_POST['year']) && $_POST['year']=="2019"){
    $year="2019";
   
}
else if(isset($_POST['year']) && $_POST['year']=="2018"){
    $year="2018";
    
}

?>

        <?php 
require "db_connect.php";
if(isset($_POST['refresh'])){
$sql1=' SELECT * from courses join classcourses on courses.courseId = classcourses.idCourse join studentsclass on studentsclass.classId = classcourses.idClass where studentsclass.studentId = '.$_SESSION['studentId'].' AND classcourses.year='.$year.' AND classcourses.semester='.$semstr.'';
$studentCoursesfiltered=mysqli_query($conn,$sql1);
$rowcount=mysqli_num_rows($studentCoursesfiltered);
if($rowcount==0){

?>

        <center>
            <h2>לא נמצאו קורסים בשנה זו, אך ניתן לבצע מעבר שנה</h2>
        </center>

        <?php
}
else{
while($res=mysqli_fetch_array($studentCoursesfiltered))
    { ?>

        <div class="display">
            <div class="font-showcase flex-container" dir="rtl" width="500px">
                <h2>שם קורס :<?php echo $res['courseName']?></h2>
                <span>מספר קורס :<?php echo $res['courseId']?></span>
                <h3>נ.ז :<?php echo $res['credit']?></h3>
                <h2>שעה :<?php echo $res['time']?></h2>
                <h2>יום :<?php echo $res['day']?></h2>
                <h2>סמסטר :<?php echo $res['semester']?></h2>

                <form action="" method="GET" dir="ltr">
                    <a><button type="submit" class="btn btn-outline-info">כניסה</button></a>
                </form>
            </div>
        </div>





        <?php }
}

}

?>
    </div>