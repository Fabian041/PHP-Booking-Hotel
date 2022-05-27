<?php
session_start();
require '../functions.php';

//menangkap id hotel dari halaman detail
$id = $_GET["id"];

$hotel = query("SELECT * FROM tb_hotel WHERE id = $id")[0];

$user_id = $_SESSION["id"];

$user = query("SELECT * FROM user WHERE id = $user_id")[0];

//set session hotel id untuk dikirimkan ke detail page
$_SESSION["hotel_id"] = $id;

if(isset($_POST["book"])){
    if(bookLogData($_POST) > 0 && bookData($_POST) > 0){
        echo "<script>
            alert('Finished to Book');   
            document.location.href = '../payment/payment.php';       
            </script>";
    }else{
        echo "<script>
        alert('Failed to Book');   
        document.location.href = 'booking.php';     
        </script>";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="booking.css">

    <!-- my font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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

    <!-- main -->
    <div class="container main">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Booking Information</h4>
                <p class="sub mt-2">Please fill up the blank fields below</p>
            </div>
        </div>
        <form action="" method="post">
            <div class="row mt-3">
                <div class="col-md-7">
                    <img src="../img/<?= $hotel["foto2"] ?>" class="card-img-top modal-pic" alt="...">
                </div>
                <div class="col-md-5">
                        <div class="form-group mt-5">
                            <label for="name">Name</label>
                            <input type="hidden" name="hotel_id" value="<?= $hotel["id"] ?>">
                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                            <input type="text" name="nama" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $user["username"] ?>" readonly>
                        </div>
                        <div class="form-group mt-4">
                            <label for="name">Email Adress</label>
                            <input type="text" name="email" class="form-control" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2" >
                        </div>
                        <div class="form-group mt-4">
                            <label for="name">Phone number</label>
                            <input type="text" name="nomor" class="form-control" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        <div class="form-group mt-4">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="tanggal" class="date">Check-in</label>
                                <input type="date" name="tanggal-pesan" class="form-control mt-1" aria-label="Recipient's username" aria-describedby="button-addon2" id="tanggal">
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal" class="date">Check-out</label>
                                <input type="date" name="tanggal-pulang" class="form-control mt-1" aria-label="Recipient's username" aria-describedby="button-addon2" id="tanggal">
                            </div>
                        </div>
                        <!-- <fieldset disabled>
                            <label for="name">Amount Paid</label>
                            <input type="text" id="disabledTextInput" name="bayar" class="form-control" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2">
                        </fieldset> -->
                        </div>
                </div>
            </div>
            <div class="row mt-button">
                <div class="col-md-3 offset-md-3">
                    <div class="mt-5 mb-5">
                        <button class="button btn btn-lg" name="book">Book</button>
                        <a class="button2 btn btn-lg btn-secondary mt-3 mb-5" name="cancel" href="../detail/detail.php?id=<?= $hotel["id"] ?>">cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

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