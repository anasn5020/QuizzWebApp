<!-- Index2.html Forms Data -->
<?php
$conn = mysqli_connect('localhost','root', '' , 'QuizzApp');

if ($conn === false){
    die("connection Failed :  " . $conn_error());
} 
// Taking the Data from Input
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$username = $_REQUEST['username'];
$password = $_REQUEST['pass'];
// Performing insert query execution
// here our table name is signup
$statment = "INSERT INTO signup  VALUES ('$name','$email','$username',
'$password')";
// After Successfully Submittion!
if(mysqli_query($conn, $statment)){
echo "<h3>You have Successfully Login!</h3>";
}
else{
echo "ERROR: Hush! Sorry $sql. "
. mysqli_error($conn);
}
// Close connection
mysqli_close($conn);
?>
