<?php
// Check if the form is submitted 
if ( isset( $_GET['submit'] ) ) { 
// retrieve the form data by using the element's name attributes value as key 
$firstname = $_GET['first_name']; $lastname = $_GET['surname']; 
// display the results 
echo '<h3>Form GET Method</h3>'; echo 'Your name is ' . $lastname . ' ' . $firstname; exit;
}
?>