<?php
	session_start();
	$username="";
	$dob="";
	$email="";
	$errors = array();
	
	//connect to the database
	$db=mysqli_connect("localhost","id7782825_sneha_patil","sdm161311","id7782825_rural");
	
	//if the register button is clicked
	if(isset($_POST['register'])){
	$username=$_POST['username'];
	$dob=$_POST['dob'];
	$email=$_POST['email'];
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
		
		//ensure that form fields are filled properly
	if(empty($username)){
			array_push($errors,"Username is required");
		}
		if(empty($dob)){
			array_push($errors,"Date of birth is required");
		}
		if(empty($email)){
			array_push($errors,"Email is required");
		}
		if(empty($password1)){
			array_push($errors,"Password is required");
		}
		if($password1 != $password2){
			array_push($errors,"The two passwords do not match");
		
		}
		//if there are no errors,save user to database
		if(count($errors == 0)){
			$password = md5($password1); //encrypt password before storing in database
			$sql = "INSERT INTO `registration`(`UserName`,`DOB`,`Email`,`Password`) VALUES ('$username','$dob','$email','$password')";
			mysqli_query($db,$sql);
			$_SESSION['username']='$username';
			$_SESSION['dob']='$dob';
			$_SESSION['email']='$email';
			$_SESSION['password']='$password';
			$_SESSION['SUCCESS']='YOU ARE NOW LOGGED IN!';
		//	header('location: login.php'); //redirect to home page
		}
	}
?>
<html>
<head>
<title>REGESTRATION FORM</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="jqform.js"></script>
<style>
form label {
  display: inline-block;
  width: 100px;
}
 
form div {
  margin-bottom: 10px;
}
 
.error {
  color: red;
  margin-left: 5px;
}
 
label.error {
  display: inline;
}
</style>
</head>
<body diplay:inline-block+>
<script>
function myFunction() {
    var inpObj = document.getElementById("age");
    if (!inpObj.checkValidity()) {
        document.getElementById("demo").innerHTML = inpObj.validationMessage;
    } else {
        document.getElementById("demo").innerHTML = "Input OK";
    } 

} 

</script>
<script>

function validateForm() {
    var x = document.forms["myForm"][" UserName"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
<script>
$(document).ready(function(){
    $("form").submit(function(){
        alert("Submitted");
    });
});
</script>
<header>
<img src ="logo.png", align= "left"; class ="i"; alt = "Rural Empowerment">
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
	<a class ="active" href="https://ruralempowerment.000webhostapp.com/server.php">Register</a>
	</div>
</div>
</nav>
<article class="a2">
<form id="first_form" onsubmit="return validateForm" method="post" action="server.php">
<!--display validation errors here-->
<?php include ('errors.php') ?>
<div>  
<label for="username">UserName:</label>
<input type= "text" id="username"  name = " username"  placeholder =" UserName" required>
</div>
<div><label for="dob">Enter DOB:</label>
<input type ="date" id="dob" name ="dob">
</div>
<div>
<div>
<label for="email">Email:</label>
<input type="email" id="email"  name="email" placeholder = Eg:xyz@gmail.com required> 
</div>
<label for="password">Password:</label>
<input type="password" id="password1"  name="password1" pattern="[A-Za-z1-9@-.] " title="no special characters" placeholder="password" required>
</div>
<div>
<label for="password">Confirm Password:</label>
<input type="password" id="password2"  name="password2" pattern="[A-Za-z1-9@-.] " title="no special characters" placeholder="password" required>
</div>
<div>
<input type="submit" name="register" class="l">
<input type="reset" name="reset" class= "l1" >
</div>
</form>
</article>
</body>