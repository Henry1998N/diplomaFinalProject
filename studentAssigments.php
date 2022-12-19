<?php 
require "db_connect.php";
require "navbar.php";


?>
<style>
#wrapper {
    text-align: center;
}

#content_container {
    margin-top: 10px;
}

.content:not(.active) {
    display: none;
}

.title {
    font-weight: bold;
    text-transform: capitalize;
    font-size: 30px;
}

.display {
    display: inline-block;
}


.font-showcase {
    margin-right: 10px;
    margin-top: 10px;
    border-radius: 5px;
    max-width: 300px;
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

.dir {
    margin-right: 10px;
    margin-top: 10px;
    margin-bottom: 10px;

}

h4 {
    padding: 15px;
    margin: 0;
}

h4 span {
    float: right;
}

.item {
    background-color: #ddd;
    margin-bottom: 20px;
    font-family: arial;
}

.item-details {
    display: none;
    padding: 15px;
}

.heading {
    font-weight: bold;
    font-size: 1.1rem;
}

.insights {
    margin: 2rem 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

.insights .insight {
    width: 280px;
    padding: 1rem;
    border-radius: 8px;
    outline: 2px solid var(--border);
    -webkit-transition: all 200ms ease-in-out;
    transition: all 200ms ease-in-out;
}

.insights .insight:hover {
    color: white;
    background-color: var(--primary);
    outline: none;
}

.insights .insight .heading {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

.insights .insight .heading .score {
    margin-left: auto;
}

.insights .insight .heading .score span {
    color: #44c790;
}

.insights .insight .heading span {
    font-size: 0.8rem;
}

.insight+.insight {
    margin-left: 1rem;
}

.number {
    font-size: 1.5rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    font-weight: bold;
    margin-top: 15px;
}

.buttotn {
    width: 150px;
    height: 100px;
    border-radius: 30px;
    margin-right: 10px;
}

.number1 {
    font-size: 0.85rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    font-weight: bold;
    margin-top: 15px;
}
</style>

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
if(!isset($_SESSION['currentCourse'])){
    $_SESSION['currentCourse']="";
}

if(isset($_POST['refresh'])){
    $_SESSION['yearWanted']=$year;
    $_SESSION['semesterWanted']=$semstr;

    $studentAssigments='SELECT l.firstName, l.lastName, l.id,cc.idClass, a.courseId FROM assigments a JOIN lecturercourses lc ON a.courseId=lc.courseId JOIN lecturer l ON lc.lecturerId=l.id JOIN classlecturers cl ON l.id=cl.lecturerid JOIN classcourses cc ON cl.classId=cc.idClass AND a.courseId=cc.idCourse WHERE a.year='.$year.' AND a.semester='.$semstr.' GROUP BY a.courseId;';
    $studentAssigmentsfiltered=mysqli_query($conn,$studentAssigments);
    $rowcount=mysqli_num_rows($studentAssigmentsfiltered);
    if($rowcount==0){
    
    ?>

    <center>
        <h2>לא נמצאו מטלות בשנה זו, אך ניתן לבצע מעבר שנה</h2>
    </center>

    <?php
    }
    else{

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
} 
}
?>