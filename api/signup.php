<?php
require_once "config.php";

$name = $email = $username = $password = "";
$name_err = $email_err = $username_err = $pass_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if name is empty
    if(empty(trim($_POST["name"]))){
        $name_err = "name cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_name);

            // Set the value of param username
            $param_name = trim($_POST['name']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $name_err = "This username is already taken"; 
                }
                else{
                    $name = trim($_POST['name']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for Email
if(empty(trim($_POST['email']))){
    $email_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['email'])) < 5){
    $email_err = "Password cannot be less than 5 characters";
}
else{
    $email = trim($_POST['email']);
}

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);

    // Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    password_err = "Password cannot be less than 5 characters";
}
else{
    $email = trim($_POST['password']);
}


// If there were no errors, go ahead and insert into the database
if(empty($name_err) && empty($email_err) && empty($username_err)&& empty($password_err) )
{
    $sql = "INSERT INTO users (name, email, username, password) VALUES (?, ?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>





























<!-- Index2.html Forms Data
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
    echo "<h3>You've Successfully Created Account!</h3>";
    echo "<a href='/index.html'>Click To Login</a>";
}
else{
echo "ERROR: Hush! Sorry $sql. "
. mysqli_error($conn);
}
// Close connection
mysqli_close($conn);
?>

