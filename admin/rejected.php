<?php 

$paymentId = $_GET["id"];

require '../functions.php';

mysqli_query($conn, "DELETE FROM tb_paymentapproval WHERE id = $paymentId");

$aff = mysqli_affected_rows($conn);

if($aff > 0){
    echo "<script>
    alert('Payment has been Rejected');   
    document.location.href = 'approval.php';       
    </script>";
}else{
    echo "<script>
    alert('Failed to reject');   
    document.location.href = 'approval.php'';       
    </script>";
}

?>