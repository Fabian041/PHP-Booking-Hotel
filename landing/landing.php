<?php
session_start();

// echo $_COOKIE["login"];

if( !isset($_SESSION["login"])){
    header("Location: ../login/login.php");
}

require '../functions.php';

$hotels = query("SELECT * FROM tb_hotel WHERE rating = 9 LIMIT 0,3");

$hotels2 = query("SELECT * FROM tb_hotel WHERE tipe = 'hotel' LIMIT 0,3");

$aparts = query("SELECT * FROM tb_hotel WHERE tipe = 'apartment' LIMIT 0,3");

$houses = query("SELECT * FROM tb_hotel WHERE tipe = 'house' LIMIT 0,3");

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
    <link rel="stylesheet" href="landing.css">

    <title>Stayventure.</title>
</head>
<body>


    <!-- nav -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="stay">Stay</span>venture.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="#hotel">Hotel</a>
                    <a class="nav-link" href="#house">House</a>
                    <a class="nav-link" href="#apart">Apartment</a>
                    <a href="../logout.php" class="btn btn-danger ml-5">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end of nav -->
    
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title"><span class="capt">Stay</span> and <span class="capt">adventure</span> at the same time</h1>
                    <p class="capt2 mt-4">we provide what you need for best trip experiences,<br>time to make another memorable moments<br>with your families and friends.</p>
                    <div class="row button">
                        <div class="col-md-2 mt-4">
                            <a class="btn btn-lg showme" name="show" href="#most-loved">Show me</a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2 tl">
                            <img src="../img/icon_tl.png" class="tl mt-5" alt="">
                            <p class="mt-2"><span class="num">80.000</span> Travelers</p>
                        </div>
                        <div class="col-md-2 touris">
                            <img src="../img/ic_tours.png" class="tl mt-5" alt="">
                            <p class="mt-2"><span class="num">71.000</span> Tours</p>
                        </div>
                        <div class="col-md-2 city">
                            <img src="../img/ic_cities.png" class="tl mt-5" alt="">
                            <p class="mt-2"><span class="num">1.024</span> Cities</p>
                        </div>  
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="../img/jumbo.jpg" class="jumbo" alt="">
                    <div class="border"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of jumbotron -->


    <!-- most picked -->
    <section class="most-picked mt-5" id="most-loved">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h4>Most Loved</h4>
                </div>
                <div class="col-md-2">
                    <a href="../search/search.php" class="btn btn-primary mr-auto">Show more</a>
                </div>
            </div>
            <div class="row mt-4">
            <?php foreach($hotels as $hotel) : ?>
                <div class="col-md-4">
                    <div class="card parallax">
                        <img src="../img/<?= $hotel["foto"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $hotel["nama"] ?></h5>
                            <p class="card-text sub"><?= $hotel["tempat"] ?></p>
                            <a href="../detail/detail.php?id=<?= $hotel["id"] ?>" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- end of them -->


    <!-- hotel -->
    <section class="hotel mt-5" id="hotel">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h4>Hotels with large living room</h4>
                </div>
                <div class="col-md-2">
                    <a href="../search/search.php" class="btn btn-primary mr-auto">Show more</a>
                </div>
            </div>
            <div class="row mt-4">
                <?php foreach($hotels2 as $hotel2) : ?>
                <div class="col-md-4">
                    <div class="card parallax">
                        <img src="../img/<?= $hotel2["foto"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $hotel2["nama"] ?></h5>
                            <p class="card-text sub"><?= $hotel2["tempat"] ?></p>
                            <a href="../detail/detail.php?id=<?= $hotel2["id"] ?>" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- end of hotel -->

    <!-- house -->
    <section class="house mt-5" id="house">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h4>Houses with backyard</h4>
                </div>
                <div class="col-md-2">
                    <a href="../search/search.php" class="btn btn-primary mr-auto">Show more</a>
                </div>
            </div>
            <div class="row mt-4">
                <?php foreach($houses as $house) : ?>
                <div class="col-md-4">
                    <div class="card parallax">
                        <img src="../img/<?= $house["foto"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $house["nama"] ?></h5>
                            <p class="card-text sub"><?= $house["tempat"] ?></p>
                            <a href="../detail/detail.php?id=<?= $house["id"] ?>" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- end of house -->

    <!-- apartmen -->
    <section class="apart mt-5" id="apart">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h4>Apartments with kitchen set</h4>
                </div>
                <div class="col-md-2">
                    <a href="../search/search.php" class="btn btn-primary mr-auto">Show more</a>
                </div>
            </div>
            <div class="row mt-4">
                <?php foreach($aparts as $apart) : ?>
                <div class="col-md-4">
                    <div class="card parallax">
                        <img src="../img/<?= $apart["foto"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $apart["nama"] ?></h5>
                            <p class="card-text sub"><?= $apart["tempat"] ?>.</p>
                            <a href="../detail/detail.php?id=<?= $apart["id"] ?>" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- end of apartmen -->

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
                <div class="col-md-12 text-center">
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
    <script src="parallax.js"></script>
</body>
</html>