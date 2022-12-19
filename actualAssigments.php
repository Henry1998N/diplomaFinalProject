<link rel="stylesheet" href="corses.css">
<?php
include "db_connect.php";
include "navbar.php";
$studentAssigments='SELECT l.firstName, l.lastName, l.id,cc.idClass, a.courseId FROM assigments a JOIN lecturercourses lc ON a.courseId=lc.courseId JOIN lecturer l ON lc.lecturerId=l.id JOIN classlecturers cl ON l.id=cl.lecturerid JOIN classcourses cc ON cl.classId=cc.idClass AND a.courseId=cc.idCourse WHERE a.year='.$_SESSION['yearWanted'].' AND a.semester='.$_SESSION['semesterWanted'].' GROUP BY a.courseId;';
$studentAssigmentsfiltered=mysqli_query($conn,$studentAssigments);
?>
<div dir="rtl">
    <?php
while($res=mysqli_fetch_array($studentAssigmentsfiltered)){
  ?>
    <div class="display" dir="rtl">
        <div class="insight">
            <form method="POST"
                action="actualAssigments.php?lectid=<?php echo $res['id']?>&courseid=<?php echo $res['courseId']; ?>">
                <button type="submit" class="buttotn" id="btn">
                    <div class="heading">
                        <?php echo $res['firstName']," ",$res['lastName'];?>
                        <div class=" score">
                            <?php echo $res['courseId']  ?>
                        </div>
                    </div>
                    <?php echo  '<div   class="number">';?>
                    &nbsp;
                    <?php echo $res['idClass'] ;?>
                </button>
            </form>

        </div>
    </div>



    <?php
      }
      ?>
</div>
<?php
$_SESSION['lecterId']=$_GET['lectid'];
$_SESSION['courseId']=$_GET['courseid'];
$contentQuery='SELECT a.assigmentName,a .department,a.assigmntFile, cc.time ,cc.day,cc.semester FROM assigments a join lecturercourses lc on a.courseId=lc.courseId join lecturer l on lc.lecturerId=l.id join classlecturers cl on l.id=cl.lecturerid join classcourses cc on cl.classId=cc.idClass and a.courseId=cc.idCourse where a.year='.$_SESSION['yearWanted'].' AND a.semester='.$_SESSION['semesterWanted'].' and lc.lecturerId='.$_SESSION['lecterId'].' AND a.courseId='.$_SESSION['courseId'].'';
$studentContentfiltered7=mysqli_query($conn,$contentQuery);
?>
<div dir="rtl">
    <?php
  while($result1=mysqli_fetch_array($studentContentfiltered7))
    { 
 
  echo   '<div  class="content display" ">';
  echo  '<a><div>';
  
  echo     '<div class="font-showcase flex-container" dir="rtl" width="500px">';
              echo  '<h2>שם מטלה : '.$result1['assigmentName'].'</h2>';
              echo       '<span>מחלקה :' .$result1['department'].'</span>';
              echo       '</br>';
              echo      '<a href="">להורדה ' .$result1['assigmntFile'].'</a>';
              echo      '<h2>שעה :  '.$result1['time'].'</h2>';
              echo      '<h2>יום :'.$result1['day'].'</h2>';
              echo     '<h2>סמסטר :'.$result1['semester'].'</h2>';
              
              echo    '<form action="" method="GET" dir="ltr">';
              echo        '<a><button type="submit" class="btn btn-outline-info">כניסה</button></a>';
              echo     '</form>';
              echo     '</div>';
              echo    '</div></a>';
          
              echo   '</div>';
  }






?>
</div>