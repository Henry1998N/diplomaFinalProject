<?php
include "navbar.php";

?>
<html>

<head>
    <meta charset="utf-8" />
    <title>דף בעברית</title>
</head>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

body {
    background-color: #111013;
    font-family: "Roboto", sans-serif;
}

.heading {
    text-align: center;
    color: white;
    font-size: 40px;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.tabel {
    box-shadow: 20px 20px 20px black;
}

table {
    width: 100%;
    table-layout: fixed;
}

.tbl-content {
    height: 300px;
    overflow-x: auto;
    margin-top: 0px;
    border: 1px solid;
}

th {
    background: #1d2428;
    color: #59c1a3;
    padding: 20px 15px;
    text-align: left;
    font-weight: 500;
    font-size: 16px;
    text-transform: uppercase;
    text-align: center;
}

td {
    padding: 15px;
    text-align: left;
    vertical-align: middle;
    font-weight: 300;
    font-size: 14px;
    color: #fff;
    text-align: center;
    border-bottom: solid 1px none;
    background: #1d2428;

}

tr {
    color: #59c1a3;
}

tr:nth-child(even) {
    background-color: #2c383d;
    color: #59c1a3;
}

section {
    margin: 50px;
}

/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 10px;
}
</style>

<body>
    <div dir="RTL" class="wrap">
        <center>

            <div class="dir">
                <form action="#" method="POST" class="div">
                    <span>סמסטר :</span>
                    <select name="semester" id="semester" class="custom-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span>שנה :</span>
                    <select class="custom-select" name="year" id="year">
                        <option value="2023">*</option>
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

        <section>
            <h1 class="heading">מערכת שעות</h1>
            <div class="tabel">
                <table>
                    <thead>
                        <tr>
                            <th>יום א</th>
                            <th>יום ב</th>
                            <th>יום ג</th>
                            <th>יום ד</th>
                            <th>יום ה</th>
                            <th>יום ו</th>
                            <th>יום ש</th>
                        </tr>
                    </thead>
                </table>
                <?php
       require "db_connect.php";
       if(isset($_POST['refresh'])){
        $sql1='SELECT b.*,c.courseName,c.credit FROM studentsclass a INNER JOIN classcourses b ON a.classId=b.idClass INNER JOIN courses c ON c.courseId = b.idCourse WHERE a.studentId ='.$_SESSION['studentId'].' AND b.year='.$year.' AND b.semester='.$semstr.' ORDER BY b.time ASC';
        $lecturerC=mysqli_query($conn,$sql1);
        $rowcount=mysqli_num_rows($lecturerC);
        if($rowcount==0){
            ?>
                <center>
                    <h2>עוד אין מערכת שעות</h2>
                </center>

                <?php
        }
        else{
        while($results=mysqli_fetch_array($lecturerC)){
         ?>

                <div>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <?php
                        if($results['day']=='א'){
                    ?>
                                    <h2><?php echo $results['courseName']?></h2>
                                    <h3>מספר קורס: <?php echo $results['idCourse'] ?></h3>
                                    <h3>כיתה: <?php echo $results['idClass'] ?></h3>
                                    <h3>משעה: <?php echo $results['time'] ?> עד <?php echo $results['ToTime']?> </h3>
                                    <h3>נ.ז: <?php echo $results['credit'] ?></h3>
                                    <?php
                        }
                    ?>
                                </td>
                                <td>
                                    <?php
                        if($results['day']=='ב'){
                    ?>
                                    <h2><?php echo $results['courseName']?></h2>
                                    <h3>מספר קורס: <?php echo $results['idCourse'] ?></h3>
                                    <h3>כיתה: <?php echo $results['idClass'] ?></h3>
                                    <h3>משעה: <?php echo $results['time'] ?> עד <?php echo $results['ToTime']?> </h3>
                                    <h3>נ.ז: <?php echo $results['credit'] ?></h3>
                                    <?php
                    }
                    ?>

                                </td>
                                <td>
                                    <?php
                        if($results['day']=='ג'){
                    ?>
                                    <h2><?php echo $results['courseName']?></h2>
                                    <h3>מספר קורס: <?php echo $results['idCourse'] ?></h3>
                                    <h3>כיתה: <?php echo $results['idClass'] ?></h3>
                                    <h3>משעה: <?php echo $results['time'] ?> עד <?php echo $results['ToTime']?> </h3>
                                    <h3>נ.ז: <?php echo $results['credit'] ?></h3>
                                    <?php
                        }
                    ?>

                                </td>
                                <td>
                                    <?php
                                    
                                    if($results['day']=='ד'){
                                ?>
                                    <h2><?php echo $results['courseName']?></h2>
                                    <h3>מספר קורס: <?php echo $results['idCourse'] ?></h3>
                                    <h3>כיתה: <?php echo $results['idClass'] ?></h3>
                                    <h3>משעה: <?php echo $results['time'] ?> עד <?php echo $results['ToTime']?> </h3>
                                    <h3>נ.ז: <?php echo $results['credit'] ?></h3>
                                    <?php
                                    }
                                ?>
                                </td>
                                <td>
                                    <?php
                        if($results['day']=='ה'){

                    ?>
                                    <h2><?php echo $results['courseName']?></h2>
                                    <h3>מספר קורס: <?php echo $results['idCourse'] ?></h3>
                                    <h3>כיתה: <?php echo $results['idClass'] ?></h3>
                                    <h3>משעה: <?php echo $results['time'] ?> עד <?php echo $results['ToTime']?> </h3>
                                    <h3>נ.ז: <?php echo $results['credit'] ?></h3>
                                    <?php
                        }
                    ?>

                                </td>
                                <td>
                                    <?php
                                       if($results['day']=='ו'){ ?>
                                    <h2><?php echo $results['courseName']?></h2>
                                    <h3>מספר קורס: <?php echo $results['idCourse'] ?></h3>
                                    <h3>כיתה: <?php echo $results['idClass'] ?></h3>
                                    <h3>משעה: <?php echo $results['time'] ?> עד <?php echo $results['ToTime']?> </h3>
                                    <h3>נ.ז: <?php echo $results['credit'] ?></h3>


                                    <?php
                        }
                    ?>
                                </td>

                                <td>
                                    <?php
                                       if($results['day']=='ש'){ ?>
                                    <h2><?php echo $results['courseName']?></h2>
                                    <h3>מספר קורס: <?php echo $results['idCourse'] ?></h3>
                                    <h3>כיתה: <?php echo $results['idClass'] ?></h3>
                                    <h3>משעה: <?php echo $results['time'] ?> עד <?php echo $results['ToTime']?> </h3>
                                    <h3>נ.ז: <?php echo $results['credit'] ?></h3>


                                    <?php
                        }
                    ?>


                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
        }
        }
    }
      ?>
            </div>

        </section>
</body>

</html>