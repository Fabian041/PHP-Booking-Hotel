<?php
session_start();

// if(isset($_COOKIE["login"])){
//     if($_COOKIE["login"] == 'true'){
//         $_SESSION["login"] = true;
//     }
// }

if(isset($_SESSION["login"])){
    header("Location: ../landing/landing.php");
    exit;
}

if(isset($_SESSION["admin_login"])){
    header("Location: ../admin/admin.php");
    exit;
}

require '../functions.php';

if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["pass"];

    $exist = mysqli_query($conn, "SELECT * from user WHERE username = '$username' ");

    if(mysqli_num_rows($exist) === 1){
        $row = mysqli_fetch_assoc($exist);
        if( password_verify($password, $row["password"])){
            //set session
            $_SESSION["login"] = true;
            
            //set session untuk menyimpan user id
            $_SESSION["id"] = $row["id"];

            //cek remember me
            if(isset($_POST["remember"])){
                setcookie("login","true", time()+3600 ); 
            }

            header("Location: ../landing/landing.php");
            exit;
        }
    }else if($username === "admin"){
        if($password === "admin001"){
            $_SESSION["admin_login"] = true;

            header("Location: ../admin/admin.php");
            exit;
        }
    }

    $error = true;

}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- my font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Stayventure.</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="stay">Stay</span>venture.</a>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- main landing -->
    <div class="container-fluid">
        <section class="main">
            <div class="row title">
                <div class="col-md-6">
                    <h3>Login to <span class="stay">Stay</span>venture.</h3>
                    <p>Thank you for get back here, <br> we will provide the best</p>
                </div>
            </div>
            <div class="row option">
                <div class="col-md-6">
                    <a class="nav-link" href="../register/register.php">Register</a>
                    <a class="nav-link ml-4" href="#">Login</a>
                </div>
            </div>
            <form action="" method="post">
                <div class="row login">
                    <div class="col-md-4">
                        <div class="form-group mt-4">
                            <label for="name">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <?php if( isset($error)) { ?>
                            <p style="color:red; font-size:12px; margin-top:5px;">your username/password was incorrect. Please double-check it.</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row login">
                    <div class="col-md-4">
                        <div class="form-group mt-2">
                            <label for="name">Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <?php if( isset($error)) { ?>
                            <p style="color:red; font-size:12px; margin-top:5px;">your username/password was incorrect. Please double-check it.</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- <div class="row cookie">
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox mt-1">
                            <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                        </div>
                    </div>
                </div> -->
                <div class="row button">
                    <div class="col-md-4 mt-5">
                        <button class="btn btn-lg" name="login">Login</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
    <!-- end of main -->





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>