<!DOCTYPE html>
<html lang="en">


<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=League+Spartan:wght@800&family=Raleway:wght@800&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" 
          href=
"https://unpkg.com/purecss@2.0.6/build/pure-min.css"
          integrity=
"sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5"
          crossorigin="anonymous">
<link rel="stylesheet" href="kk.css">
<head>

<style>
    table {
        width: 50%;
        /* height: 50vh; */
        text-align: center;
        padding-left: 50px;
        padding-right: 80px;
        padding-top: 20px;
        margin-right: -260px;
        margin-top: 10px;


    }

    th {
        font-size: large;
    }

     th, td{
        border: 2px solid black;
        border-collapse: collapse;

    }
    .form-control {
        padding: 7px;
        margin: 10px;
        width: 140px;
        margin-left: 60px;
        border-radius: 4px;
        border-style: none;

    }

    .item {
        margin-left: 300px;
    }

    .qu {
        padding: 7px;
        width: 60px;
        border-radius: 4px;
        border-style: none;
    }

    .btn2 {
        text-align: center;
        border-style: none;
        background-color: #7efeeb;
        width: 90px;
        height: 35px;
        border-radius: 4px;
        font-family: 'Raleway', sans-serif;
        font-size: 13px;
        

    }
    .btn2:hover{
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.main{
    /* width: 100%; */
    margin-left: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column-reverse;
}
.table{
    margin-top: 50px;
}
 .pro{
    margin-left: -200px;
 }
</style>



    <!-- Your head content here -->
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
<h3 align="center">Generate Bill</h3>

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
            <li><a href="view.php"><i class="fa-solid fa-display fa-beat" style="color: #ffffff;"></i> View Items</a></li>
            <li><a href="genrate.php"><i class="fa-solid fa-file-invoice fa-flip" style="color: #ffffff;"></i> Genrate Bill</a>
            </li><br><br><br><br><br><br><br><br><br>
            <li><a href=""><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> Logout</a></li>
        </ul>
    </div>

    
    <div class="main">
        <div class="table">
            <table class="pure-table pure-table-horizontal">
         <thead>
        
         <h1 style="margin-left: 170px; margin-top:10px;">Receipt</h1>
         </div>
        
         <tr>
         <th>SR.NO</th>
         <th>PRODUCT NAME</th>
         <th>QUANTITY</th>
         <th colspan="4">PRICE</th>
         <th>Total</th>
         </tr>
         </thead>
         <tbody>
            
    <?php
    if ( isset($_POST['submit'])) {

        if($_POST["SELECTITEMS"])
        {
            $selectedItem = $_POST["SELECTITEMS"];
        $quantity = $_POST["quantity"];

        $q1 = "INSERT INTO `selecteditems`( `name`, `quantity`) VALUES ('$selectedItem',$quantity)";
        mysqli_query($conn , $q1);

        $q2 = "select * from selecteditems";
        $r = mysqli_query($conn , $q2);
        
        if($r->num_rows > 0)
        {
            $no = 1;
            while($row = mysqli_fetch_assoc($r))
            {
                $name = $row["name"];
                $quant = $row["quantity"];
                $query = "SELECT * FROM items WHERE names = '$name'";
                $result = mysqli_query($conn, $query);
                
                while($prc = mysqli_fetch_assoc($result))
                {
                    $price = $prc["price"];
                    $totalItemPrice = $quant * $price;



                    echo '<tr>';
                    echo '<td>'.$no.'</td>';
                    echo '<td>' . $name . '</td>';
                    echo '<td>' . $quant . '</td>';
                    echo '<td colspan="4">' . $price . '</td>';
                    echo '<td>' . $totalItemPrice . '</td>';
                    echo '</tr>';   
                    $no++;
                }
                
                // if ($result) {
            
                //     // Calculate total item price
                    
                //     // Display the receipt table
                   
               
                    
                // }
            }
            
        }
        }
        // Process the form data when it's submitted
        
     
}
    ?>

    </tr>
    </tbody>
    </table>

    <form method="POST">
        <input type="submit" name="delete" value="Clear All" class="btn2">
            <?php
                if(isset($_POST['delete'])){
                    $del="DELETE FROM `selecteditems`";
                    $res = mysqli_query($conn,$del);
                }
            ?>
        </form>

</div>

    <div class="pro" align="center">
        <form method="POST">
            <label for="SELECTITEMS" class="item">ITEMS LIST</label>
            <SELECT name="SELECTITEMS" id="SELECTITEMS" class="form-control" required>
                <option value=''>Select items...</option>
                <?php
                $query = "SELECT * FROM items";
                $d = mysqli_query($conn, $query);
                while ($rows = mysqli_fetch_assoc($d)) {
                    echo '<option value="' . $rows['names'] . '">' . $rows['names'] . '</option>';
                }
                ?>
            </SELECT>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="10" class="qu" required>
            <input type="submit" name="submit" value="Add Item" class="btn2">
           
        </form>

        
    </div> 
    </div>
    <br/>
</body>

</html>
