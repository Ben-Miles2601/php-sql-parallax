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

$conn = mysqli_connect($servername, $username, $password, $database)
;
if(isset($_POST['username']) && isset($_POST['password'])){
	    echo "DOING LOGIN";
	    echo "<pre>" . print_r($_POST,true) . "</pre>";

	    $salt = "befkjbefkjkaalegsegssekjgn";
	    $password = $_POST['password'];
	    $password = md5($password . $salt);

	    
	    $AllUsers = "SELECT * FROM friends WHERE email_address = '" . $_POST['username'] . "' AND password = '" . $password  . "' ";
	    $stuff = $conn->query($AllUsers);

	    $userDetails = mysqli_fetch_assoc($stuff);

	    if($userDetails) {
	        echo "LOGIN SUCCESSFUL";
	    } else {
	        echo "Failed login";
	    }
	}


if(isset($_POST['first_name']) && !isset($_POST['id'])) {

	$salt = "befkjbefkjkaalegsegssekjgn";
	$password = $_POST['password'];
	$password = md5($password . $salt);

	$sql = "SELECT id, first_name, surname, email_address, telephone, password FROM friends";
	$result = $conn->query($sql);

	$sql = "INSERT INTO friends (first_name, surname, email_address, telephone, password) 
	VALUES ('" . $_POST['first_name'] . "', '" . $_POST['surname'] . "', '" . $_POST['email_address'] . "', '" . $_POST['telephone'] . "', '" . $password . "')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}


// Check if the form is submitted 
if ( isset($_GET['show'] ) ) { 

	
	//$conn->query('SELECT * FROM friends') ;
	$AllUsers = "SELECT * FROM friends";
        $stuff = $conn->query($AllUsers);
        
        if (mysqli_num_rows($stuff) > 0) {
            while ($userRow = mysqli_fetch_assoc($stuff)) {
                echo "User: "  . $userRow['id'] . "<br>";
                echo "Name: '" . $userRow['first_name'] . " " . $userRow['surname'] .  "<br>";        
                echo "Email: " . $userRow['email_address'] . " <br>";
                echo "Phone Number: " . $userRow['telephone'] . " <br><br>";
                echo "Password: " . $userRow['password'] . "<br>";
                echo "<a href='index.php?id=" . $userRow['id'] . "'>Edit User</a><br><br>";
            }
        }

} 
if (isset($_POST['Remove_User'])) {
	$thing = $_POST['Remove_User'];

	$sql = "DELETE FROM friends WHERE id = '" . $thing . "'";
	

	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}

if (isset($_POST['id'])) {
	$thing = $_POST['id'];


	$qry = "UPDATE friends 
			SET first_name = '" . $_POST['first_name'] . "', 
				surname = '" . $_POST['surname'] . "', 
				email_address = '" . $_POST['email_address'] . "', 
				telephone = '" . $_POST['telephone'] . "'
			WHERE id = '" . $thing . "'";
	

	if ($conn->query($qry) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
}

if(isset($_GET['id'])) {

	$id = $_GET['id'];
	$AllUsers = "SELECT * FROM friends WHERE id = " . $id;
        $stuff = $conn->query($AllUsers);
        
        $userDetails = mysqli_fetch_assoc($stuff);
        print_r($userDetails);
        
}


$conn->close();
?>

<html>
	<head>
		<title>Ben's Dungeon</title>
	</head>
	<font color="red">
	<body background="https://s-media-cache-ak0.pinimg.com/736x/11/d3/15/11d31543d2141800d56c09d93e9c44e3.jpg">
		<?php echo '<p>Welcome to my Dungeon</p>' ?>
		<input type="button" value="Say Hi!" onclick="alert('Licky licky')" />
		</font>
	</body>

	<hr>
	
	<form action="index.php" method="post">
		
		<h3>First Name</h3>
		<input type="text" name="first_name">
		<h3>Surname</h3>
		<input type="text" name="surname">
		<h3>Email</h3>
		<input type="text" name="email_address">
		<h3>Telephone</h3>
		<input type="text" name="telephone">
		<h3>Password</h3>
		<input type="password" name="password">
		<button type="submit" id='submit'>Create user</button>

	

	</form>
	<a href="index.php?show=true">Show all users</a>
	<form action="index.php" method="post">
	<h3>Username</h3>
	<input type="text" name="username">
	<h3>Password</h3>
	<input type="password" name="password">
	<button type = "submit" id="Authorise">Login</button>
	<hr>
	</form>
	<h3>To delete a user enter their ID</h3>
	<form action="index.php" method="post">
		<input type="text" name="Remove_User">
		<button type="submit" id='Remove'>Enter</button>
	</form>
	<h3>Find user by ID to update a record</h3>
	<form action="index.php" method="get">
		<input type="text" name="id">
		<button type="submit" id='Remove'>Find User</button>
	</form>
	<?php
	if(isset($userDetails)) {
		?>
		<form action="index.php" method="post">	
		<br>
		<h3>Update a user - ID NEEDED</h3>
		<input type="text" name="id" value="<?=$userDetails['id']?>">
		<h3>Update a user - First Name</h3>
		<input type = "text" name = "first_name" value="<?=$userDetails['first_name']?>">
		<h3>Update a user - Surname</h3>
		<input type = "text" name = "surname" value="<?=$userDetails['surname']?>">
		<h3>Update a user - Email Address</h3>
		<input type = "text" name = "email_address" value="<?=$userDetails['email_address']?>">
		<h3>Update a user - Telephone Num.</h3>
		<input type = "text" name = "telephone" value="<?=$userDetails['telephone']?>">
		<button type="submit" id='UpdateAll'>Update All</button>
		</form>
		<?php
	}
	?>
	



		
	
	<div></div>
</html>
