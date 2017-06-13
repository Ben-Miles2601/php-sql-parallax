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
//$thing = $_POST[‘first_name’]; {
//	echo $thing;
//}
//$[$database]->query($pee) {
//	$pee = “INSERT INTO first_name
//}
//<input type="button" value="Say Hi!" onclick="location='test.php'" />
$conn->close();
?>

<html>
	<head>
		<title> Ben's Dungeon</title>
	</head>
	<font color="red">
	<body background="https://s-media-cache-ak0.pinimg.com/736x/11/d3/15/11d31543d2141800d56c09d93e9c44e3.jpg">
		<?php echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus facilisis, neque vitae blandit auctor, justo ex rutrum mi, et consectetur lectus nulla vitae ipsum. Nam mollis sit amet velit non lobortis. Donec euismod pretium rhoncus. Maecenas elementum tempus nunc nec finibus. Nam semper blandit vulputate. Curabitur at volutpat nibh. Suspendisse dictum facilisis nisl, sed lobortis ligula vulputate a. Aliquam et blandit lectus. Curabitur a tincidunt urna. Donec bibendum erat non nulla elementum fringilla. Maecenas et mollis ipsum. Quisque vitae mi sed odio semper rutrum. In dapibus, mi non mollis lobortis, elit elit vestibulum orci, tincidunt aliquam nulla quam eu dui. Nunc aliquet luctus leo, gravida vestibulum est maximus id.</p>' ?>
		<input type="button" value="Say Hi!" onclick="alert('Licky licky')" />
		</font>
	</body>

	<hr>
	<h3>First Name</h3>
	<form action="index.php" method="post">
		<input type="text" name="first_name">
		<h3>Surname</h3>
		<input type="text" name="surname">
		<h3>Email</h3>
		<input type="text" name="email_address">
		<h3>Telephone</h3>
		<input type="text" name="telephone">
		<button type="submit">Create user</button>
	</form>

		
	
	<div></div>
</html>