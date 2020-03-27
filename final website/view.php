<?php
	$db=mysqli_connect("localhost","id7782825_sneha_patil","sdm161311","id7782825_rural");
	$result1 = mysqli_query($db, "SELECT * FROM complaint");
	$result2 = mysqli_query($db, "SELECT * FROM idea");
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
	<a href="https://ruralempowerment.000webhostapp.com/login.php">Login</a>>
	<a href="https://ruralempowerment.000webhostapp.com/server.php">Register</a>
	</div>
</div>
</nav>
<article class="a1">
<div id="content">
<?php
	echo "your complaint are here:";
    while ($row = mysqli_fetch_array($result1)) {
      echo "<div id='img_div'>";
        echo "<table border=1>";
        echo "<tr>";
        echo "<td>";
      	echo "<img src='image1/".$row['image']."jpeg' >";
      	 echo "</td>";
      	  echo "<td>";
      	echo "<p>".$row['text']."</p>";
      	echo "</td>";
      	echo "</tr>";
      	echo "</table>";
      echo "</div>";
  }
	echo "your suggested ideas are here:";
    while ($row = mysqli_fetch_array($result2)) {
      echo "<div id='img_div'>";
      echo "<table border=1>";
        echo "<tr>";
        echo "<td>";
      	echo "<img src='image2/".$row['image']."jpeg' >";
      	 echo "</td>";
      	  echo "<td>";
      	echo "<p>".$row['text']."</p>";
      	echo "</td>";
      	echo "</tr>";
        echo "</table>";
      echo "</div>";
    }
?>
</div>
</article>
</body>
</html>