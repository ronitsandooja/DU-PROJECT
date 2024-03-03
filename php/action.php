<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style4.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>User Dashboard</title>
</head>

<body>
    <nav>
        <div class="logotxt">
            <a href="index.html"><img id="logo" src="iconn.jpg" /></a>
            <h1>WASTE WISE WONDER</h1>
        </div>
        <div class="nav-links" id="navLinks">
            <i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
            <ul>
                <li><a href="index.html">HOME</a></li>
            </ul>
        </div>
        <i class="fa-solid fa-bars" onclick="showMenu()"></i>
    </nav>
    <section class="information">
        <div class="container1">
            <h1>Welcome to Dashboard</h1>


            <?php
            if (isset($_POST["login"])) {
                $receivedEmail = $_GET['email'];
                echo $receivedEmail;
                $dbhost = 'localhost';
                $dbuser = 'root';
                $dbpass = '';
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
                require_once "database.php";
                include 'login.php';
                echo $email;
                $sql = "SELECT * FROM loginTable WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result);
                echo "Welcome : " . $user["name"] . " Your Email : " . $user["email"] . "<br>";
                // if (mysqli_num_rows($result) > 0) {
                //     while ($row = mysqli_fetch_assoc($result)) {
                //         echo "Welcome : " . $row["name"] . " Your Email : " . $row["email"] . "<br>";
                //     }
                // } else {
                //     echo "0 results";
                // }
            }
            ?>

            <div class="content">
                <div>
                    ------------------------------------------------- <span id="name "></span>
                </div>
                <div>
                    Welcome : xyz <span id="name "></span>
                </div>

                <div>
                    Your Email : xyz@gmail.com<span id="email"></span>
                </div>

                <div>
                    Active Notifications : NO notifications till now!!! <span id="notification"></span>
                </div>
                <a href="logout.php" class="btn btn-warning">Logout</a>
            </div>
        </div>
    </section>
</body>

</html>