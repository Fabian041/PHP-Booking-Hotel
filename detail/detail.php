<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: ../login/login.php");
}

require '../functions.php';

$id = $_GET["id"];

$hotel = query("SELECT * FROM tb_hotel WHERE id = $id")[0];



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
    <link rel="stylesheet" href="detail.css">

    <title>Stayventure.</title>
</head>
<body>


    <!-- nav -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="../landing/landing.php"><span class="stay">Stay</span>venture.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link active" href="../landing/landing.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="../aboutus/aboutUs.php">About us</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end of nav -->

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="title"><?= $hotel["nama"] ?></h2>
                    <p class="sub"><?= $hotel["tempat"] ?></p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-7">
                    <img src="../img/<?= $hotel["foto2"] ?>" alt="" class="jumbo">
                </div>
                <div class="col-md-3">
                    <img src="../img/<?= $hotel["foto3"] ?>" alt="" class="mini">
                    <img src="../img/<?= $hotel["foto4"] ?>" alt="" class="mini-2">
                </div>
            </div>
        </div>
    </div>
    <!-- end of jumbotron -->

    <!-- about -->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h4 class="about-title">About the Place</h4>
                    <p class="about-sub"><?= $hotel["deskripsi"] ?></p>
                    <h4 class="about-title mt-5">Fasilities</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="fasilities-card-1 p-1 mt-4">
                                <h5 class="fasilities-sub"><?= $hotel["fasilitas_1"] ?></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fasilities-card-2 p-1 mt-4">
                                <h5 class="fasilities-sub"><?= $hotel["fasilitas_2"] ?></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fasilities-card-3 p-1 mt-4">
                                <h5 class="fasilities-sub"><?= $hotel["fasilitas_3"] ?></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fasilities-card-4 p-1 mt-4">
                                <h5 class="fasilities-sub"><?= $hotel["fasilitas_4"] ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-1">
                    <h4 class="about-title">Start Booking</h4>
                    <p class="price-sub"><span class="price mr-1">$<?= $hotel["harga"] ?></span>per night</p>
                        <input type="hidden" value="<?= $hotel["id"] ?>" name="id" >
                        <a href="../booking/booking.php?id=<?= $hotel["id"] ?>" class="button btn btn-primary mt-3">Book now</a>
                        <a href="../landing/landing.php?id=<?= $hotel["id"] ?>" class="button2 btn btn-secondary mt-3">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of about -->


    <!-- footer -->
    <div class="container">
        <div class="footer">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="mt-5"><span class="stay">Stay</span>venture</h5>
                    <p class="pfooter">We provide what you need <br> for best trip experience</p>
                </div>
                <div class="col-md-3">
                    <h5 class="mt-5 begin">For Beginners</h5>
                    <p class="pfooter mt-4">New Account</p>
                    <p class="pfooter">Payments</p>
                    <p class="pfooter">Book</p>
                </div>
                <div class="col-md-3">
                    <h5 class="mt-5 begin">Explore Us</h5>
                    <p class="pfooter mt-4">About</p>
                    <p class="pfooter">Privacy Policy</p>
                    <p class="pfooter">Terms & Conditions</p>
                </div>
                <div class="col-md-3">
                    <h5 class="mt-5 begin">Getting Touch</h5>
                    <p class="pfooter mt-4">stayventure@book.com</p>
                    <p class="pfooter">08122661232</p>
                    <p class="pfooter">StayCation V1, Pekalongan</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-4">
                    <p class="pfooter mt-5">Copyright 2020 - Fabian</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end of footer -->

    
    
    
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