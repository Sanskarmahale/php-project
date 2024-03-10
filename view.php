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

    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="kk.css">
</head>
<style>
    table,
    th,
    td {

        margin-left: 700px;
        padding: 15px;

    }

    table {
        border: solid;
    }
</style>

<body>
    <h3 align="center">View Items</h3>

    <!-- Your sidebar and form -->
    <div class="sidebar">
        <h2><a href="main2.php">Menu</a></h2>

        <ul>
            <li><a href="add.php"> <i class="fa-solid fa-cart-arrow-down fa-beat" style="color: #ffffff;"></i> Add
                    Items</a></li>
            <li><a href="removei.php"><i class="fa-solid fa-trash-can fa-shake" style="color: #ffffff;"></i> Remove
                    Item</a></li>
            <li><a href="emp1.php"><i class="fa-solid fa-user-plus fa-bounce" style="color: #ffffff;"></i> Add User</a>
            </li>
            <li><a href="emp2.php"><i class="fa-solid fa-user-minus fa-beat-fade" style="color: #ffffff;"></i> Remove
                    User</a></li>
            <li><a href=""><i class="fa-solid fa-display fa-beat" style="color: #ffffff;"></i> View Items</a></li>
            <li><a href="genrate2.php"><i class="fa-solid fa-file-invoice fa-flip" style="color: #ffffff;"></i> Genrate Bill</a>
            </li><br><br><br><br><br><br><br><br><br>
            <li><a href=""><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> Logout</a></li>
        </ul>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "billing2";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT names, price,code FROM items";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ITEMS</th><th>PRICE</th><th>ITEM CODE</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["names"] . "</td><td>" . $row["price"] . "</td><td>" . $row["code"];
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>


</body>

</html>