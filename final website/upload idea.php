<?php
	$msg="";
	//if upload button is pressed
	if(isset($_POST['upload'])){
	$file = $_FILES['file'];
	$text =$_POST['text'];
	$fileName = $_FILES['file']['name'];
	$fileTmpname = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg','jpeg','png');
	
	if(in_array($fileActualExt,$allowed)){
		if($fileError === 0)
		{
			if($fileSize < 1000000){
				$fileNameNew = uniqid('',true)."".$fileActualExt;
				$fileDestination = 'image2/'.$fileNameNew;
				move_uploaded_file($fileTmpname,$fileDestination);
				header("location:upload idea.php?uploadsuccess");
			}
			else{
				echo "Your file is too big!";
			}
		}
		else{
			echo "Error in uploading files";
		}
	}
	else{
		echo "You cannot upload file of this type!";
	}
	
	//connect to the database
	$db=mysqli_connect("localhost","id7782825_sneha_patil","sdm161311","id7782825_rural");

	
	
	$sql= "INSERT INTO `idea` (`image`,`text`) VALUES('$fileName','$text')"; 
	mysqli_query($db,$sql);//stores the submitted data into the database table:images
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<title>
Rural Empowerment
</title>
</head>
<body>
<header>
<img src ="logo.png", align= "left";class ="i"; alt = "Rural Empowerment" style ="display: block;margin-left:200px;width:150px;height:190px;">>
<h1> RURAL EMPOWERMENT</h1>
</header>
<nav>
<div class="topnav">
	 <a href="https://ruralempowerment.000webhostapp.com/index.html">Home</a>
	<a href="https://ruralempowerment.000webhostapp.com/upload.html">Upload</a>
	<a href="https://ruralempowerment.000webhostapp.com/about.html">About Us</a>
	<a href="https://ruralempowerment.000webhostapp.com/contact.html">Contact Us</a>
	<div class="topnav-right">
	<a href="https://ruralempowerment.000webhostapp.com/login.php">Login</a>
	<a href="https://ruralempowerment.000webhostapp.com/server.php">Register</a>
	</div>
</div>
</nav>
<article class ="a1">
<div>
<p> You can give some innovative ideas too to develop your Rural area:<br>																														
																1. upload the snapped photo if any <br>
																2. and add some description of your idea in the textfield<br>
																3. click on upload ideas<br>
</p>
</div>
<form name = "myForm1" action = "upload idea.php" method="post" enctype="multipart/form-data">
<div>
    <input type="hidden" name ="size" value="10000000">
<input type="file" name="file"><br>
</div>
<div>
<p> give your idea here</p>
<textarea name="text" style(align="center") rows="5" cols="48"></textarea>
</div>
<div>
<input type="submit" name ="upload" class= "l" value="Submit">
</div>
</article>
</body>
</html>