<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=League+Spartan:wght@800&family=Raleway:wght@800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="kk.css">

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
    <div class="sidebar">
        <h2><a href="main2.html">Menu</a></h2>

        <ul>
            <li><a href="add.php"> <i class="fa-solid fa-cart-arrow-down fa-beat" style="color: #ffffff;"></i> Add Items</a></li>
            <li><a href="removei.php"><i class="fa-solid fa-trash-can fa-shake" style="color: #ffffff;"></i> Remove Item</a></li>
            <li><a href="emp1.php"><i class="fa-solid fa-user-plus fa-bounce" style="color: #ffffff;"></i> Add User</a></li>
            <li><a href="emp2.php"><i class="fa-solid fa-user-minus fa-beat-fade" style="color: #ffffff;"></i> Remove User</a></li>
            <li><a href="view.php"><i class="fa-solid fa-display fa-beat" style="color: #ffffff;"></i> View Items</a></li>
            <li><a href="genrate2.php"><i class="fa-solid fa-file-invoice fa-flip" style="color: #ffffff;"></i> Genrate Bill</a></li><br><br><br><br><br><br><br><br><br>
            <li><a href=""><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> Logout</a></li>
        </ul>



    </div>
    <form method="POST">
        <h3 align="center">Remove User</h3>
        <div class="aa" align="center">

            <label for="l" class="lb">Employee User Name</label>
            <input type="text" name="new" class="control1">
            <br>
            <br>


            <br>
            <input type="submit" name="Submit" value="Submit" class="btn">



        </div>

    </form>

    <?php

    if (isset($_POST['Submit'])) {
        $new = $_POST['new'];
        $q = "DELETE FROM newuser WHERE new = '$new'";
        $r = mysqli_query($conn, $q);
    }

    ?>



</body>

</html>