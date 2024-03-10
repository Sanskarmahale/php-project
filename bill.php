<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous"> -->
    <style>
        h1 {
            text-align: center;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 30px;
        }

        .backBtn {
            margin: 50px 0 10px 150px;
            padding: 10px 20px;
            background-color: grey;
            color: white;
            border-radius: 10px;
            border: none;
        }

        .table {
            margin-bottom: 30px;
            background-color: lightgrey;
            padding: 40px;
            border-radius: 5px;
            font-size: 20px;
            width: 50%;

        }

        table {
            width: 100%;
        }

        td {
            text-align: center;
        }

        .cancelBtn {
            font-size: 15px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: lightcoral;
        }

        .billBtn {
            font-size: 15px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: lightgreen;
        }

        .msg {
            margin-top: 30px;
            text-align: center;
            border: 1px solid black;
            padding: 10px;
            border-radius: 20px;
            background-color: lightgreen;
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "billing2";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    ?>
    <form method="post">
        <button name='back' class="backBtn">&#8592 Back</button>
    </form>

    <h1>Receipt</h1>
    <div class="main">
        <div class="table">
            <table>
                <thead>
                    <div class="receipt">
                        <tr>
                            <th>SR.NO</th>
                            <th>PRODUCT NAME</th>
                            <th>QUANTITY</th>
                            <th>PRICE</th>
                            <th>Total</th>
                        </tr>
                </thead>
                <tbody>
                    <?php

                    $q2 = "select * from selecteditems";
                    $r = mysqli_query($conn, $q2);

                    if ($r->num_rows > 0) {
                        $no = 1;
                        $totalItemPrice = 0;
                        while ($row = mysqli_fetch_assoc($r)) {
                            $name = $row["name"];
                            $quant = $row["quantity"];
                            $query = "SELECT * FROM items WHERE names = '$name'";
                            $result = mysqli_query($conn, $query);

                            while ($prc = mysqli_fetch_assoc($result)) {
                                $price = $prc["price"];
                                $singleItmePrice = $quant * $price;
                                $totalItemPrice +=  $singleItmePrice;

                                echo '<tr>';
                                echo '<td>' . $no . '</td>';
                                echo '<td>' . $name . '</td>';
                                echo '<td>' . $quant . '</td>';
                                echo '<td>' . $price . '</td>';
                                echo '<td>' . $singleItmePrice . '</td>';
                                echo '</tr>';
                                $no++;
                            }
                        }
                    }
                    ?>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <hr>
                        </td>
                        <td>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>Total Price :</th>
                        <?php
                        echo "<th>$totalItemPrice</th>";
                        ?>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="buttons">
            <form method="post">
                <input type="submit" name="cancel" value="Cancel Bill" class="cancelBtn">
                <input type="submit" name="bill" value="Generate Bill" class="billBtn">
            </form>
        </div>
    </div>


    <?php
    if (isset($_POST['back'])) {
        header("Location:genrate2.php");
    }
    if (isset($_POST['cancel'])) {
        $q = "delete FROM `selecteditems`";
        mysqli_query($conn, $q);
        header("Location:genrate2.php");
    }


    if (isset($_POST['bill'])) {
        // echo "<div class='msg'><script>document.write('Bill Generated Successfully.')</script></div>";
        echo "<script>window.print()</script>";
        // header("Location: http://localhost/php/sanskar/MY%20NEW/genrate2.php");
    }
    ?>
</body>

</html>