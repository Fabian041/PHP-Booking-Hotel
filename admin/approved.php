<?php 

$paymentId = $_GET["id"];

require '../functions.php';

//mengambil data payment approval
$payments = query("SELECT p.id,u.username,h.nama,p.nama_bank,p.bukti_bayar,p.jumlah_bayar,p.nama_pengirim,p.hotel_id, p.user_id FROM tb_paymentapproval p INNER JOIN user u ON p.user_id = u.id INNER JOIN tb_hotel h ON p.hotel_id = h.id WHERE p.id = $paymentId")[0];

$nama_pengirim = $payments["nama_pengirim"];
$nama_bank = $payments["nama_bank"];
$bukti_bayar = $payments["bukti_bayar"];
$jumlah_bayar = $payments["jumlah_bayar"];
$user_id = $payments["user_id"];
$hotel_id = $payments["hotel_id"];

//memasukkannya lagi ke table payment karena 
//table approval payment akan dihapus setelah payment telah di approve
$query = "INSERT INTO tb_payments
        VALUES
            ('','$nama_pengirim','$nama_bank','$bukti_bayar','$jumlah_bayar','$user_id','$hotel_id')";

mysqli_query($conn, $query);

$aff = mysqli_affected_rows($conn);

if($aff > 0){
    //hapus data yang telah di approve dari halaman approval
    mysqli_query($conn, "DELETE FROM tb_paymentapproval WHERE id = $paymentId");

    echo "<script>
    alert('Payment has been approved');   
    document.location.href = 'admin.php';       
    </script>";
}else{
    echo "<script>
    alert('Failed to approve');   
    document.location.href = 'approval.php';       
    </script>";
}

?>

