<?php
require 'functions.php';

$id = $_GET["id"];

if(hapus($id) > 0){
    echo "<script>
            alert('data has been deleted');
            document.location.href = 'admin/admin.php';
        </script>";
}