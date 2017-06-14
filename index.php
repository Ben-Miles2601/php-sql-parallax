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




if(isset($_POST['first_name'])) {

	$sql = "SELECT id, first_name, surname, email_address, telephone FROM friends";
	$result = $conn->query($sql);

	$sql = "INSERT INTO friends (first_name, surname, email_address, telephone) 
	VALUES ('" . $_POST['first_name'] . "', '" . $_POST['surname'] . "', '" . $_POST['email_address'] . "', '" . $_POST['telephone'] . "')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}


// Check if the form is submitted 
if ( isset($_POST['first_name'] ) ) { 
// retrieve the form data by using the element's name attributes value as key 
$firstname = $_POST['first_name']; $lastname = $_POST['surname']; 
// display the results 
echo '<h3>Form GET Method</h3>'; select * from friends;
} 


$conn->close();
?>

<html>
	<head>
		<title>Ben's Dungeon</title>
	</head>
	<font color="red">
	<body background="https://s-media-cache-ak0.pinimg.com/736x/11/d3/15/11d31543d2141800d56c09d93e9c44e3.jpg">
		<?php echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>' ?>
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
		<button type="submit" id='submit'>Create user</button>

	

	</form>

	 	 <a href='filename.php'> Retrieve Data? </a>


		
	
	<div></div>
</html>

