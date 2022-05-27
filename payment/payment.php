<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: ../login/login.php");
}

//tangkap user id yang masuk melalui halaman login
$userId = $_SESSION["id"];

require '../functions.php';

//query untuk menampilkan total yang harus dibayarkan
$query = "SELECT datediff(b.tanggal_pulang, b.tanggal_pesan)*h.harga as total 
        FROM tb_booking b INNER JOIN tb_hotel h ON b.hotel_id = h.id 
        INNER JOIN user u ON b.user_id = u.id
        WHERE b.user_id = $userId";

    $objPay = mysqli_query($conn, $query);
    $arrpay = mysqli_fetch_assoc($objPay);
//total bayar
$pay = $arrpay["total"];

//menangkap ID hotel dari halaman booking
$hotel_id = $_SESSION["hotel_id"];
$hotel = query("SELECT * FROM tb_hotel WHERE id = $hotel_id")[0];

if(isset($_POST["pay"])){
    //menghapus data booking setelah payment (menekan tombol pay)
    delete_bookLog($userId);
    if(payments($_POST, $pay, $userId, $hotel_id) > 0){
        echo "<script>
            alert('You are Finish!!');
            document.location.href = '../finish_payment/finish_payment.php';
            </script>";
    }else{
        echo "<script>
        alert('failed to Pay');
        document.location.href = '../landing/booking.php';
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

    <!-- my font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="payment.css">

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
                <h4>Payment</h4>
                <p class="sub mt-2">Please fill up the blank fields below</p>
            </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col-md-4 offset-md-2 mt-5">
                    <h5>Total Payment: </h5>
                    <h5>$<?= $pay ?></h5>
                    <img src="../sourceImg/payment.png" width="300px" alt="">
                </div>
                <div class="col-md-4 offset-md-1">
                        <div class="form-group mt-5">
                            <label for="nama_pengirim">Sender's Name</label>
                            <input type="hidden" name="id" value="<?= $hotel["id"] ?>">
                            <input type="text" name="nama_pengirim" class="form-control" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        <div class="form-group mt-4">
                            <label for="nama_bank">Bank Name</label>
                            <input type="text" name="nama_bank" class="form-control" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        <div class="form-group mt-4">
                            <label for="bukti_bayar">Evidence of Transfer</label>
                            <input type="file" name="bukti_bayar">
                        </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5 offset-md-3">
                    <button class="btn btn-lg button" name="pay">pay</button>
                    <a class="button2 btn btn-lg btn-secondary mt-3 mb-5" href="../booking/booking.php?id=<?= $hotel["id"] ?>" onclick="window.open('../d_bookLog/delete_bookLog.php?user_id=<?= $userId ?>');">cancel</a>
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