<?php

$conn = mysqli_connect("localhost","root","","hotel");

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    if(strlen($username) < 6 ){
        echo "<script>
                alert('username at least 6 characters');
            </script>";
        return false;
    }
    $password = mysqli_real_escape_string($conn, $data["pass"]);
    if(strlen($password) < 8 ){
        echo "<script>
                alert('password at least 8 characters');
            </script>";
        return false;
    }
    $cpass = mysqli_real_escape_string($conn, $data["c-pass"]);

    //cek ketersediaan username
    $exist = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($exist)){
        echo "<script>
                alert('username already exist');
            </script>";
        return false;
    }


    if($password !== $cpass){
        echo "<script>
                alert('password incorrect')
            </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($conn);
}

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}


function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $tipe = $data["tipe"];
    $fasilitas1 = htmlspecialchars($data["fasilitas_1"]);
    $fasilitas2 = htmlspecialchars($data["fasilitas_2"]);
    $fasilitas3 = htmlspecialchars($data["fasilitas_3"]);
    $fasilitas4 = htmlspecialchars($data["fasilitas_4"]);
    $tempat = htmlspecialchars($data["tempat"]);
    $rating = htmlspecialchars($data["rating"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $harga = htmlspecialchars($data["harga"]);
    
    //cek apakah ada foto yang di upload
    $foto = upload();
    $foto2 = upload2();
    $foto3 = upload3();
    $foto4 = upload4();
    if( !$foto ){
        return false;
    }
    if( !$foto2 ){
        return false;
    }
    if( !$foto3 ){
        return false;
    }
    if( !$foto4 ){
        return false;
    }

    $query = "INSERT into tb_hotel
                VALUES
                ('','$nama','$tipe','$fasilitas1','$fasilitas2','$fasilitas3','$fasilitas4','$tempat','$rating','$deskripsi','$harga','$foto','$foto2','$foto3','$foto4')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_hotel WHERE id = $id");
    return mysqli_affected_rows($conn); 
}


function update($data, $id){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $tipe = $data["tipe"];
    $fasilitas1 = htmlspecialchars($data["fasilitas_1"]);
    $fasilitas2 = htmlspecialchars($data["fasilitas_2"]);
    $fasilitas3 = htmlspecialchars($data["fasilitas_3"]);
    $fasilitas4 = htmlspecialchars($data["fasilitas_4"]);
    $tempat = htmlspecialchars($data["tempat"]);
    $rating = htmlspecialchars($data["rating"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $harga = htmlspecialchars($data["harga"]);
    $fotoLama = $data["fotoLama"];
    $fotoLama2 = $data["fotoLama2"];
    $fotoLama3 = $data["fotoLama3"];
    $fotoLama4 = $data["fotoLama4"];
    
        if( $_FILES["foto"]["error"] === 4){
            $foto = $fotoLama;
        }else{
            $foto = upload();
        }

        if( $_FILES["foto2"]["error"] === 4){
            $foto2 = $fotoLama2;
        }else{
            $foto2 = upload2();
        }

        if( $_FILES["foto3"]["error"] === 4){
            $foto3 = $fotoLama3;
        }else{
            $foto3 = upload3();
        }

        if( $_FILES["foto4"]["error"] === 4){
            $foto4 = $fotoLama4;
        }else{
            $foto4 = upload4();
        }

    $query = "UPDATE tb_hotel SET
                nama = '$nama',
                tipe = '$tipe', 
                fasilitas_1 = '$fasilitas1',
                fasilitas_2 = '$fasilitas2',
                fasilitas_3 = '$fasilitas3',
                fasilitas_4 = '$fasilitas4',
                tempat = '$tempat',
                rating = '$rating',
                deskripsi = '$deskripsi',
                harga = '$harga',
                foto = '$foto',
                foto2 = '$foto2',
                foto3 = '$foto3',
                foto4 = '$foto4'  
            WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    
    $fileName = $_FILES["foto"]["name"];
    $fileSize = $_FILES["foto"]["size"];
    $tmpFile = $_FILES["foto"]["tmp_name"];
    $error = $_FILES["foto"]["error"];

    //cek apabila inputan kosong
    if( $error === 4 ){
        echo "
        <script>
            alert('please input picture');
        </script>        
        ";
        return false;
    }
    //cek apakah file yang dikirim adalah foto
    //menentukan extensi apa saja yang dapat di upload
    $extensionValidation = ['jpg','jpeg','png','jfif'];
    
    //memisahkan extensi dengan nama file
    $extension = explode('.',$fileName); // ==> ['namafoto','extensi']

    //mengambil index terakhir dari variabel extension dan mengubah extensi menjadi huruf kecil semua
    $extension = strtolower(end($extension));

    //pengecekan file yang diupload dengan extensi yang dibolehkan
    if( !in_array($extension , $extensionValidation)){
        echo "
        <script>
            alert('this is not picture, please input picture');
        </script>        
        ";
        return false;
    }

    //cek maximal ukuran file
    if( $fileSize > 2000000 ){
        echo "
        <script>
            alert('ur file size is to large');
        </script>        
        ";
        return false;
    }

    //membuat nama file baru
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $extension;

    //Penempatan file yang telah diupload
    move_uploaded_file($tmpFile, 'img/' . $newFileName);

    return $newFileName;
}

function upload2(){
    
    $fileName2 = $_FILES["foto2"]["name"];
    $fileSize2 = $_FILES["foto2"]["size"];
    $tmpFile2 = $_FILES["foto2"]['tmp_name'];
    $error2 = $_FILES["foto2"]["error"];

    //cek apabila inputan kosong
    if( $error2 === 4 ){
        echo "
        <script>
            alert('please input picture');
        </script>        
        ";
        return false;
    }

    //cek apakah file yang dikirim adalah foto
    //menentukan extensi apa saja yang dapat di upload
    $extensionValidation = ['jpg','jpeg','png','jfif'];

    //memisahkan extensi dengan nama file
    $extension2 = explode('.',$fileName2); // ==> ['namafoto','extensi']

    //mengambil index terakhir dari variabel extension dan mengubah extensi menjadi huruf kecil semua
    $extension2 = strtolower(end($extension2));

    //pengecekan file yang diupload dengan extensi yang dibolehkan
    if( !in_array($extension2 , $extensionValidation)){
        echo "
        <script>
            alert('this is not picture2, please input picture');
        </script>        
        ";
        return false;
    }

    //cek maximal ukuran file
    if( $fileSize2 > 2000000 ){
        echo "
        <script>
            alert('ur file size is to large');
        </script>        
        ";
        return false;
    }

    //membuat nama file baru
    $newFileName2 = uniqid();
    $newFileName2 .= '.';
    $newFileName2 .= $extension2;

    //Penempatan file yang telah diupload
    move_uploaded_file($tmpFile2, 'img/' . $newFileName2);

    return $newFileName2;
}

function upload3(){
    
    $fileName3 = $_FILES["foto3"]["name"];
    $fileSize3 = $_FILES["foto3"]["size"];
    $tmpFile3 = $_FILES["foto3"]['tmp_name'];
    $error3 = $_FILES["foto3"]["error"];

    //cek apabila inputan kosong
    if( $error3 === 4 ){
        echo "
        <script>
            alert('please input picture');
        </script>        
        ";
        return false;
    }

    //cek apakah file yang dikirim adalah foto
    //menentukan extensi apa saja yang dapat di upload
    $extensionValidation = ['jpg','jpeg','png','jfif'];

    //memisahkan extensi dengan nama file
    $extension3 = explode('.',$fileName3); // ==> ['namafoto','extensi']

    //mengambil index terakhir dari variabel extension dan mengubah extensi menjadi huruf kecil semua
    $extension3 = strtolower(end($extension3));

    //pengecekan file yang diupload dengan extensi yang dibolehkan
    if( !in_array($extension3 , $extensionValidation)){
        echo "
        <script>
            alert('this is not picture3, please input picture');
        </script>        
        ";
        return false;
    }

    //cek maximal ukuran file
    if( $fileSize3 > 2000000 ){
        echo "
        <script>
            alert('ur file size is to large');
        </script>        
        ";
        return false;
    }

    //membuat nama file baru
    $newFileName3 = uniqid();
    $newFileName3 .= '.';
    $newFileName3 .= $extension3;

    //Penempatan file yang telah diupload
    move_uploaded_file($tmpFile3, 'img/' . $newFileName3);

    return $newFileName3;
}

function upload4(){
    
    $fileName4 = $_FILES["foto4"]["name"];
    $fileSize4 = $_FILES["foto4"]["size"];
    $tmpFile4 = $_FILES["foto4"]['tmp_name'];
    $error4 = $_FILES["foto4"]["error"];

    //cek apabila inputan kosong
    if( $error4 === 4 ){
        echo "
        <script>
            alert('please input picture');
        </script>        
        ";
        return false;
    }

    //cek apakah file yang dikirim adalah foto
    //menentukan extensi apa saja yang dapat di upload
    $extensionValidation = ['jpg','jpeg','png','jfif'];

    //memisahkan extensi dengan nama file
    $extension4 = explode('.',$fileName4); // ==> ['namafoto','extensi']

    //mengambil index terakhir dari variabel extension dan mengubah extensi menjadi huruf kecil semua
    $extension4 = strtolower(end($extension4));

    //pengecekan file yang diupload dengan extensi yang dibolehkan
    if( !in_array($extension4 , $extensionValidation)){
        echo "
        <script>
            alert('this is not picture4, please input picture');
        </script>        
        ";
        return false;
    }

    //cek maximal ukuran file
    if( $fileSize4 > 2000000 ){
        echo "
        <script>
            alert('ur file size is to large');
        </script>        
        ";
        return false;
    }

    //membuat nama file baru
    $newFileName4 = uniqid();
    $newFileName4 .= '.';
    $newFileName4 .= $extension4;

    //Penempatan file yang telah diupload
    move_uploaded_file($tmpFile4, 'img/' . $newFileName4);

    return $newFileName4;
}

function search($keyword){
    $query = "SELECT * FROM tb_hotel WHERE 
            nama LIKE '%$keyword%' OR
            tempat LIKE '%$keyword%' OR
            rating LIKE '%$keyword%' OR
            harga LIKE '%$keyword%'";

    return query($query);
}

//data booking yang akan tetap ada
function bookLogData($data){
    global $conn;
    $hotel_id = $data["hotel_id"];
    $user_id = $data["user_id"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $nomor = htmlspecialchars($data["nomor"]);
    $tanggalPesan = $data["tanggal-pesan"];
    $tanggalPulang = $data["tanggal-pulang"];

    //insert data yang telah diinputkan pada booking page
    $query = "INSERT into tb_bookLog 
                VALUES
            ('','$nama','$email','$nomor','$tanggalPesan','$tanggalPulang','$hotel_id','$user_id')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//data booking bersifat sementara, akan terhapus setelah melakukan payment
function bookData($data){
    global $conn;
    $hotel_id = $data["hotel_id"];
    $user_id = $data["user_id"];
    $nama = $data["nama"];
    $email = htmlspecialchars($data["email"]);
    $nomor = htmlspecialchars($data["nomor"]);
    $tanggalPesan = $data["tanggal-pesan"];
    $tanggalPulang = $data["tanggal-pulang"];

    //insert data yang telah diinputkan pada booking page
    $query = "INSERT into tb_booking
                VALUES
            ('','$nama','$email','$nomor','$tanggalPesan','$tanggalPulang','$hotel_id','$user_id')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//fungsi hapus data book sementara setelah melakukan payment
function delete_bookLog($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_booking WHERE user_id = $id");

    return mysqli_affected_rows($conn); 
}

function amountPay($userId){
    global $conn;

    $query = "SELECT datediff(tanggal_pulang, tanggal_pesan)*harga as total FROM tb_booking INNER JOIN tb_hotel 
                ON tb_booking.hotel_id = tb_hotel.id WHERE id = $userId";

    $objPay = mysqli_query($conn, $query);

    return $objPay;
}

function payments($data, $pay, $userId, $hotel_id){
    global $conn;

    $nama = htmlspecialchars($data["nama_pengirim"]);
    $bank = htmlspecialchars($data["nama_bank"]);
    $bukti = uploadBukti();

    //cek apakah ada butki bayar
    if( !$bukti ){
        return false;
    }

    $query = "INSERT INTO tb_paymentapproval
                VALUES
            ('','$nama','$bank','$bukti','$pay','$userId','$hotel_id')";

    mysqli_query($conn,$query);


    return mysqli_affected_rows($conn);
}

function uploadBukti(){
    
    $fileName = $_FILES["bukti_bayar"]["name"];
    $fileSize = $_FILES["bukti_bayar"]["size"];
    $tmpFile = $_FILES["bukti_bayar"]["tmp_name"];
    $error = $_FILES["bukti_bayar"]["error"];

    //cek apabila inputan kosong
    if( $error === 4 ){
        echo "
        <script>
            alert('please input picture');
        </script>        
        ";
        return false;
    }
    //cek apakah file yang dikirim adalah foto
    //menentukan extensi apa saja yang dapat di upload
    $extensionValidation = ['jpg','jpeg','png','jfif'];
    
    //memisahkan extensi dengan nama file
    $extension = explode('.',$fileName); // ==> ['namafoto','extensi']

    //mengambil index terakhir dari variabel extension dan mengubah extensi menjadi huruf kecil semua
    $extension = strtolower(end($extension));

    //pengecekan file yang diupload dengan extensi yang dibolehkan
    if( !in_array($extension , $extensionValidation)){
        echo "
        <script>
            alert('this is not picture, please input picture');
        </script>        
        ";
        return false;
    }

    //cek maximal ukuran file
    if( $fileSize > 2000000 ){
        echo "
        <script>
            alert('ur file size is to large');
        </script>        
        ";
        return false;
    }

    //membuat nama file baru
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $extension;

    //Penempatan file yang telah diupload
    move_uploaded_file($tmpFile, '../buktiBayar/' . $newFileName);

    return $newFileName;
}


?>