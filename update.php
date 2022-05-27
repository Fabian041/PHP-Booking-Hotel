<?php
require 'functions.php';

//ambil id
$id = $_GET["id"];

//ambil semua data hotel sesuai id yang diambil
$hotel = query("SELECT * FROM tb_hotel WHERE id = $id")[0];

if(isset($_POST["submit"])){
    if(update($_POST, $id) > 0){
        echo "<script>
            alert('data has been updated');
            document.location.href = 'admin/admin.php';
            </script>";
    }else{
        echo "<script>
        alert('failed to update data');
        document.location.href = 'admin/admin.php';
        </script>";
    }
}
if(isset($_POST["cancel"])){
    echo "<script>
        alert('canceled');
        document.location.href = 'admin/admin.php';
        </script>";
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
    <link rel="stylesheet" href="tambah.css">

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


    <div class="container">
        <table class="table table-bordered mt-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Update Hotel Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="container">
                            <form action="" method="post" class="mt-3" enctype="multipart/form-data">
                            <input type="hidden" name="fotoLama" value="<?= $hotel["foto"] ?>">
                            <input type="hidden" name="fotoLama2" value="<?= $hotel["foto2"] ?>">
                            <input type="hidden" name="fotoLama3" value="<?= $hotel["foto3"] ?>">
                            <input type="hidden" name="fotoLama4" value="<?= $hotel["foto4"] ?>">
                                <label for="nama">Hotel Name</label>
                                <input type="text" name="nama" class="form-control mb-3" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2" id="nama" value="<?= $hotel["nama"] ?>">

                                <label for="tipe">Type</label>
                                <select class="custom-select mb-3" id="validationCustom04" name="tipe">
                                    <option selected value="<?= $hotel["tipe"] ?>">Choose...</option>
                                    <option value="hotel">Hotel</option>
                                    <option value="house">House</option>
                                    <option value="apartment">Apartment</option>
                                </select>

                                <label for="tempat">Location</label>
                                <input type="text" name="tempat" class="form-control mb-3" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2" id="tempat" value="<?= $hotel["tempat"] ?>">

                                <div class="row">
                                    <div class="col">
                                        <label for="fasilitas1">Facilities 1</label>
                                        <input type="text" name="fasilitas_1" class="form-control mb-3" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2" id="fasilitas1" value="<?= $hotel["fasilitas_1"] ?>">
                                    </div>
                                    <div class="col">
                                        <label for="fasilitas2">Facilities 2</label>
                                        <input type="text" name="fasilitas_2" class="form-control mb-3" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2" id="fasilitas2" value="<?= $hotel["fasilitas_2"] ?>">
                                    </div>
                                    <div class="col">
                                        <label for="fasilitas3">Facilities 3</label>
                                        <input type="text" name="fasilitas_3" class="form-control mb-3" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2" id="fasilitas3" value="<?= $hotel["fasilitas_3"] ?>">
                                    </div>
                                    <div class="col">
                                        <label for="fasilitas4">Facilities 4</label>
                                        <input type="text" name="fasilitas_4" class="form-control mb-3" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2" id="fasilitas4" value="<?= $hotel["fasilitas_4"] ?>">
                                    </div>
                                </div>

                                <label for="rating">Rating</label>
                                <input type="text" name="rating" class="form-control" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2" id="rating" value="<?= $hotel["rating"] ?>">
                                <small id="emailHelp" class="form-text text-muted mb-3">write numbers, without periods and commas.</small>

                                <label for="deskripsi">Description</label>
                                <input type="text" name="deskripsi" class="form-control mb-3" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2" id="deskripsi" value="<?= $hotel["deskripsi"] ?>">

                                <label for="harga">Price</label>
                                <input type="text" name="harga" class="form-control" placeholder="Please type here..." aria-label="Recipient's username" aria-describedby="button-addon2" id="harga" value="<?= $hotel["harga"] ?>">
                                <small id="emailHelp" class="form-text text-muted mb-3">write numbers, without periods and commas.</small>
                                
                                <div class="row mt-5">
                                    <div class="col">
                                        <div class="form-group mb-5">
                                            <label for="exampleFormControlFile1">photo 1</label>
                                            <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-5">
                                            <label for="exampleFormControlFile1">photo 2</label>
                                            <input type="file" name="foto2" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-5">
                                            <label for="exampleFormControlFile1">photo 3</label>
                                            <input type="file" name="foto3" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-5">
                                            <label for="exampleFormControlFile1">photo 4</label>
                                            <input type="file" name="foto4" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group mb-5">
                                    <label for="exampleFormControlFile1">Upload photo</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div> -->

                                <div class="row mb-3">
                                    <div class="col">
                                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                                        <button class="btn btn-danger" type="submit" name="cancel">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
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