<?php
	error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT);
	session_start();
	$username="";
	$password="";
	$errors=array();

	$db=mysqli_connect("localhost","id7782825_sneha_patil","sdm161311","id7782825_rural");
	if (isset($_POST['Login'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];

			if(empty($username)){
				array_push($errors, "Username is required");
			}

			if(empty($password)){
				array_push($errors, "Password is required");
			}
			if(count($errors)==0){
				$password=md5($password);
				$query= "SELECT * FROM `registration` WHERE UserName ='$username'";
				$result=mysqli_query($db,$query);
				if(mysqli_num_rows($result)==1){
				$_SESSION['username']=$username;
				$_SESSION['success']="You are now logged in";
				header('location: index.html');
				}
				else{
					array_push($errors, "Wrong username/password combination");
				}
			}
		}

?>


<!DOCTYPE html>
<html>
<head>
<title>LOGIN FORM</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
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
<img src ="logo.png", align= "left", class ="i"; alt = "Rural Empowerment">
<h1> RURAL EMPOWERMENT</h1>
</header>
<nav>
<div class="topnav">
	 <a href="https://ruralempowerment.000webhostapp.com/index.html">Home</a>
	<a href="https://ruralempowerment.000webhostapp.com/upload.html">Upload</a>
	<a href="https://ruralempowerment.000webhostapp.com/about.html">About Us</a>
	<a href="https://ruralempowerment.000webhostapp.com/contact.html">Contact Us</a>
	<div class="topnav-right">
	<a class ="active" href="https://ruralempowerment.000webhostapp.com/login.php">Login</a>
	<a href="https://ruralempowerment.000webhostapp.com/server.php">Register</a>
	</div>
</div>
</nav>
<section>
<article class='a2'>
<form name = "myForm" onsubmit="return validateForm()" method="post" action="login.php">
<!--display validation errors here-->
<?php include ('errors.php') ?>
<br><br<label for="first_name">UserName:</label>
<input type= "text" id="first_name"  name = " username"  placeholder =" UserName" value="<?php echo $username; ?>" required>
<br><br><label for="password">Password:</label>
<input type="password" id="password"  name="password" placeholder="password" required>
<br><br><input type="submit" name="Login" class="l" value="Submit">
</form>
</article>
</section>
</body>
</html>

