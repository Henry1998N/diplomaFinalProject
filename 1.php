<?php
	$msg = "";
	//if upload button is pressed
	if(isset($_POST['upload']))
	{
		//the path to store the upload image
		$target = "images/".basename($_FILES['image']['name']); //need to change the path
		
		
		// connect to the database
		$db = mysqli_connect('localhost','root','','final_project');
		
		//get all the submitted data from the form
		$image = $_FILES['image']['name'];
		$text = $_POST['text'];
		$sql = "INSERT INTO images (image,text) VALUES ('$image','$text')";
		mysqli_query($db,$sql); //stores the submitted data into the database table : images
		
		//now lets move the uploaded image into the filder : images
		if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
			$msg = "Image uploaded successfully";
		}
		else
		{
			$msg = "There was a problem uploading image";	
		}
	}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Image Upload</title>
    <link rel="stylesheet" type="text/css href=" style.css">
</head>

<body>
    <div id="content">
        <!-- <?php
	
	// $db = mysqli_connect('localhost','root','','final_project');
	// $sql= "SELECT * FROM images";
	// $result = mysqli_query($db,$sql);
	// while($row = mysqli_fetch_array($result))
	// {
	// 	echo "<div id = 'img_div'>";
	// 		echo "<img src ='images/".$row['image']."'>";
	// 		echo "<p>".$row['text']."</p>";
	// 	echo "</div>";	
	// }
	
	
?> -->
        <form method="POST" action="upload_rar.php" enctype="multipart/form-data">

            <div>
                <input type="file" name="file">
                <button type="submit" name="uploadbtn">upload file</button>
            </div>

        </form>
    </div>
</body>

</html>