<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=League+Spartan:wght@800&family=Raleway:wght@800&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">

    <title>Billing System</title>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "billing2";




// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<body>
    <div class="Heading">
        <h1 align="center">WELCOME TO OUR BILLING SYSTEM</h1>

    </div>

    <div class="adminimage">
        <img src="1707088.png" width="130px">
    </div>


    <div class="container1">

        <form class="mylogin" method="POST">

            <div class="in">
                <input type="text" name="user" placeholder="Enter User Name" required>
            </div>
            <br>
            <div class="in">
                <input type="password" name="pass" placeholder="Enter Password" required><br><br><br>
            </div>
            <div class="cont">
                <button type="submit" name="Log">Login</button>
            </div>


        </form>


    </div>

</body>

</html>
<?php
if ($conn) {



    if (isset($_POST['Log'])) {
        session_start();
        $user1 = $_POST['user'];
        $psswd = $_POST['pass'];

        $_SESSION["username"] = $user1;
        $_SESSION["password"] = $psswd;

        $check_query = "SELECT * FROM newuser WHERE new ='$user1' AND pass='$psswd'";
        $check_result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($check_result) > 0) {

            header("Location: main2.php");

            exit();
        } else {
            echo "<script>alert('Invalid email or password. Please try again.');</script>";
        }
    }
}
