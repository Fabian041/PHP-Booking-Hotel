<?php
session_start();

if( !isset($_SESSION["admin_login"])){
    header("Location: ../login/login.php");
}

require '../functions.php';

$payments = query("SELECT p.id,u.username,h.nama,p.nama_bank,p.bukti_bayar,p.jumlah_bayar FROM tb_payments p INNER JOIN user u ON p.user_id = u.id INNER JOIN tb_hotel h ON p.hotel_id = h.id")

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">

    <!-- my font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Stayventure.</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="stay">Stay</span>venture.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link active" href="admin.php">Hotel</a>
                    <a class="nav-link" href="approval.php">Payment Check</a>
                    <a class="nav-link" href="#">Payment Log</a>
                    <a class="nav-link" href="bookLog.php">Book Log</a>
                    <a href="../logout.php" class="btn btn-danger ml-5">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->


    <!-- hotel table -->
    <section class="hotel">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <h4>Payment Data Center</h4>
                    <p class="sub">You can monitor all payment data here</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Username</th>
                                <th scope="col">Hotel Name</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Payment Slip</th>
                                <th scope="col">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($payments as $payment) : ?>
                            <tr>
                                <th class="text-center" scope="row"><?= $i; ?></th>
                                <td class="text-center"><?= $payment["username"] ?></td>
                                <td class="text-center"><?= $payment["nama"] ?></td>
                                <td class="text-center"><?= $payment["nama_bank"] ?></td>
                                <td class="text-center"><a href="../buktiBayar/<?= $payment["bukti_bayar"] ?>" class="btn btn-primary" download="payment Slip">Download File</a></td>
                                <td class="text-center">$<?= $payment["jumlah_bayar"] ?></td>
                            </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </section>
    <!-- end of table -->

    

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
