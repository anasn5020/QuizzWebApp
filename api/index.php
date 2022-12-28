<!-- Index.html Forms Data -->
<?php
$conn = mysqli_connect('localhost','root', '' , 'QuizzApp');

if ($conn === false){
    die("connection Failed :  " . $conn_error());
} 
// Taking the Data from Input
$email = $_REQUEST['email'];
$pass = $_REQUEST['pass'];
// Performing insert query execution
// here our table name is login
$statment = "INSERT INTO login  VALUES ('$email',
'$pass')";
// After Successfully Submittion!
if(mysqli_query($conn, $statment)){
echo "<h3>You have Successfully Login!</h3>";

// echo nl2br("First Name:$fName\n Last Name: $lName\n "
// . "Email: $email\n Number:$number\n Message:$message");
}
else{
echo "ERROR: Hush! Sorry $sql. "
. mysqli_error($conn);
}
// Close connection
mysqli_close($conn);
?>
