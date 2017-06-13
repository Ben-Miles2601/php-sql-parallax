<?php

$servername = "localhost";
$username = "homestead";
$password = "secret";
$database = "php-sql";

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "SELECT id, first_name, surname, email_address, telephone FROM friends";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {

	}
} else {
	echo "0 results";
}

if(isset($_POST['first_name'])) {
	echo $_POST['first_name'];
}
//<input type="button" value="Say Hi!" onclick="location='test.php'" />
$conn->close();
?>

<html>
	<head>
		<title> Ben's Dungeon</title>
	</head>
	<font color="red">
	<body background="https://s-media-cache-ak0.pinimg.com/736x/11/d3/15/11d31543d2141800d56c09d93e9c44e3.jpg">
		<?php echo '<p>Welcome to my Dungeon</p>' ?>
		<input type="button" value="Say Hi!" onclick="alert('Licky licky')" />
		</font>
	</body>

	<hr>
	<h3>Insert user</h3>
	<form action="index.php" method="post">
		<input type="text" name="first_name">
		<button type="submit">Create user</button>
	</form>
	<div></div>
</html>