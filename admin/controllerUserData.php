<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../img/logo.png">
    <script src="../js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
    <script src="../js/sweetalert2@10.js"></script>
</head>
<body>
<?php 
session_start();
require "koneksi.php";
$email = "";
$errors = array();

//if user signup button
if(isset($_POST['register'])){
    $username = strtolower(stripslashes($_POST["username"])); 
    $password = mysqli_real_escape_string($kon, $_POST["password"]);
    $password2 = mysqli_real_escape_string($kon, $_POST["password2"]);
    $namaDepan = mysqli_real_escape_string($kon, $_POST["namaDepan"]);
    $namaBelakang = mysqli_real_escape_string($kon, $_POST["namaBelakang"]);
    $email = mysqli_real_escape_string($kon, $_POST["email"]);
    $level = mysqli_real_escape_string($kon, $_POST["level"]);
    if($password !== $password2){
        $errors['password'] = "Confirm password not matched!";
    }

    $email_check = "SELECT * FROM akun WHERE email = '$email'";
    $res = mysqli_query($kon, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    $username_check = "SELECT * FROM akun WHERE username = '$username'";
    $res2 = mysqli_query($kon, $username_check);
    if(mysqli_num_rows($res2) > 0){
        $errors['username'] = "Username that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO akun VALUES('', '$namaDepan', '$namaBelakang', '$email', '$username', '$encpass', '$code', '$status', '$level')";
        $data_check = mysqli_query($kon, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Hello $namaDepan, your verification code is $code , Thanks ~ admin@tokozi.cianjur";
            $sender = "From: tokoz1.cianjur@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($kon, $_POST['otp']);
        $check_code = "SELECT * FROM akun WHERE code = $otp_code";
        $code_res = mysqli_query($kon, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE akun SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($kon, $update_otp);
            if($update_res){
                sleep(5);
                header('location: prosesLogout.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($kon, $_POST['username']);
        $password = mysqli_real_escape_string($kon, $_POST['password']);
        $check_username = "SELECT * FROM akun WHERE username = '$username'";
        $res = mysqli_query($kon, $check_username);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            $level = $fetch['level'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $status = $fetch['status'];
                if($status == 'verified' && $level == 0){
                    $_SESSION['info'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['level'] = 0;
                    header("Location: home.php");
                    exit;
                }
                elseif($status == 'verified' && $level == 1){
                    $_SESSION['info'] = true;
                    $_SESSION['level'] = 1;
                    header("Location:http://localhost/kaoscustomcianjur/shop/index.php");
                    exit;
                }
                else{
                    $info = "It's look like you haven't still verify your email ";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['username'] = "Incorrect username or password!";
            }
        }else{
            $errors['username'] = "Incorrect username or password";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($kon, $_POST['email']);
        $check_email = "SELECT * FROM akun WHERE email='$email'";
        $run_sql = mysqli_query($kon, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE akun SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($kon, $insert_code);
            if($run_query){
                $subject = "Reset Password Verification Code";
                $message = "Hello $nama, your verification code for Reset Password is $code , Thanks ~ admin@tokozi.cianjur";
                $sender = "From: tokoz1.cianjur@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($kon, $_POST['otp']);
        $check_code = "SELECT * FROM akun WHERE code = $otp_code";
        $code_res = mysqli_query($kon, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($kon, $_POST['password']);
        $cpassword = mysqli_real_escape_string($kon, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email'];
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE akun SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($kon, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }

        //if user click change password2 button on home and homeUser page
        if(isset($_POST['change-password2'])){
            $user = mysqli_real_escape_string($kon, $_POST['username']);
            $nPassword = mysqli_real_escape_string($kon, $_POST['password']);
            $cPassword = mysqli_real_escape_string($kon, $_POST['cpassword']);

        if($nPassword !== $cPassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $encpass = password_hash($nPassword, PASSWORD_BCRYPT);
            $update_pass = "UPDATE akun SET password = '$encpass' WHERE username = '$user'";
            $run_query = mysqli_query($kon, $update_pass);
            if($run_query){
                ?>
                <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '<p style="color : white; font-size:20px; text-shadow: 2px 2px #000000;">Your password changed. Now you can login with your new password.</p>',
                    showConfirmButton: true,
                    confirmButtonText : '<a href="prosesLogout.php" style="text-decoration:none; color:white; font-size:20px;"><div style="width:100%; height:100%;">CONTINUE</div></a>',
                    background : "linear-gradient(to right, #192888, #4151c0)",   
                });
                </script>
          <?php
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: prosesLogout.php');
    }

    //insert data
    if(isset($_POST["insertData"])){
            
            $mBarang = htmlspecialchars(mysqli_real_escape_string($kon, $_POST["mBarang"]));
            $jBarang = htmlspecialchars(mysqli_real_escape_string($kon, $_POST["jBarang"]));
            $stock = htmlspecialchars(mysqli_real_escape_string($kon, $_POST["stock"]));
            $harga = htmlspecialchars(mysqli_real_escape_string($kon, $_POST["harga"]));
            $filename = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];

            $type1 = explode('.', $filename);
            $type2 = $type1[1];
            $newname = 'baju'.time().'.'.$type2;
            $tipe_diizinkan = array('jpg','jpeg','png','gif');

            if(!in_array($type2,$tipe_diizinkan)){
                echo'<script>alert("Format File Tidak Diizinkan!")</script>';
            }
            else{
                move_uploaded_file($tmp_name, '../img/baju/'.$newname);
                $query= mysqli_query($kon, "INSERT INTO barang(mBarang,jBarang,stock,harga,foto) VALUES('$mBarang', '$jBarang', '$stock', '$harga' ,'$newname')");
                if($query){
                ?>
                    <!-- <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '<p style="color : white; font-size:20px; text-shadow: 2px 2px #000000;">INSERT SUCCESS</p>',
                        background : "linear-gradient(to right, #192888, #4151c0)", 
                        showConfirmButton : true,
                        timer : 1500,  
                    });
                    </script> -->
                 <?php
                 echo"<script>alert('Data berhasil dimasukkan');document.location='home.php'</script>";
                }
                else{
                    echo "<script> alert('Data Gagal Dimasukan');</script>";
                }
            }
            

        
        }

        if(isset($_POST['updateDetail'])){
            $nama = htmlspecialchars(mysqli_real_escape_string($kon, $_POST['mBarang']));
            $kategori = htmlspecialchars(mysqli_real_escape_string($kon, $_POST['jBarang']));
            $stok = htmlspecialchars(mysqli_real_escape_string($kon, $_POST['stock']));
            $harga = htmlspecialchars(mysqli_real_escape_string($kon, $_POST['harga']));
            $deskrpsi = mysqli_real_escape_string($kon, $_POST['deskripsi']);
            $update_gambar = "";
	
            if(!empty($_FILES["gambarBarang"]["name"])){
                $nama_file = $_FILES["gambarBarang"]["name"];
                move_uploaded_file($_FILES["gambarBarang"]["tmp_name"], "../img/baju/".$nama_file);
                
                $update_gambar = ", foto='$nama_file'";
            }
            
                $query= mysqli_query($kon, "UPDATE barang SET mBarang='$nama',jBarang='$kategori',stock='$stok',harga='$harga' $update_gambar, deskripsi='$deskrpsi' WHERE id='".$_GET['id']."'");
                if($query){
                 echo"<script>alert('Data berhasil diupdate');document.location='home.php?page=storeAdmin'</script>";
                }
                else{
                    echo "<script> alert('Data Gagal diupdate');</script>";
                }
        }

        if(isset($_POST['nextCheckout'])){
            
			$query=mysqli_query($kon,"SELECT id FROM praorders WHERE account = '".$_SESSION['username']."'");
			$row = mysqli_fetch_assoc($query);
            $id = $row['id'];
            $akun = htmlspecialchars(mysqli_real_escape_string($kon, $_SESSION["username"]));
            $nama = htmlspecialchars(mysqli_real_escape_string($kon, $_POST["namaPenerima"]));
            $nomor = htmlspecialchars(mysqli_real_escape_string($kon, $_POST["nomorPenerima"]));
            $alamat = htmlspecialchars(mysqli_real_escape_string($kon, $_POST["alamat"]));
            $kota = htmlspecialchars(mysqli_real_escape_string($kon, $_POST["kota"]));
            $waktu_saat_ini = date("Y-m-d H:i:s");
            
                $query= mysqli_query($kon, "INSERT INTO orders(id,account,nama,nomor,alamat,kota,tanggalPemesanan) VALUES('$id','$akun','$nama', '$nomor', '$alamat', '$kota', '$waktu_saat_ini')");
                if($query){
                    $ambilFaktur = mysqli_query($kon, "SELECT id FROM orders ORDER BY id DESC");
                    $row = mysqli_fetch_assoc($ambilFaktur);
                    $nomorFaktur = $row['id'];
                    $ambilCart = mysqli_query($kon, "SELECT * FROM cart WHERE customer='".$_SESSION['username']."'");
                    while($masukCart=mysqli_fetch_assoc($ambilCart)){
                        $idBarang = $masukCart['idBarang'];
                        $qty = $masukCart['qty'];
                        mysqli_query($kon,"INSERT INTO orders_detail(nomorFaktur,idBarang,qty) VALUES('$nomorFaktur','$idBarang','$qty')");
                    }
                        ?>
                        <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '<p style="color : white; font-size:20px; text-shadow: 2px 2px #000000;">THANK YOU FOR YOUR ORDERS</p>',
                            background : "linear-gradient(to right, #192888, #4151c0)", 
                            showConfirmButton : true  
                        });
                        document.location="index.php?page=konfirmasiPembayaran&id=<?php echo $id ?>";
                        </script>
                    <?php
                }
                else{
                    echo "<script> alert('Data Gagal Dimasukan');</script>";
                }
        }
        if(isset($_POST['updateStatus'])){
            $nomorFaktur = htmlspecialchars(mysqli_real_escape_string($kon, $_POST['nomorFaktur']));
            $status = htmlspecialchars(mysqli_real_escape_string($kon, $_POST['status']));
	    
                $query= mysqli_query($kon, "UPDATE orders SET status='$status' WHERE id=$nomorFaktur");
                if($query){
                 echo"<script>alert('Status berhasil diupdate');document.location='home.php?page=orders'</script>";
                }
                else{
                    echo "<script> alert('Status Gagal diupdate');</script>";
                }
        }
        if(isset($_POST['insertBanner'])){

            $banner = $_POST['banner'];
            $status = $_POST['status'];
            $nama_file = $_FILES["file"]["name"];
                
            move_uploaded_file($_FILES["file"]["tmp_name"], "../img/" . $nama_file);
            
                $insert = mysqli_query($kon, "INSERT INTO banner(banner,gambar,status) VALUES ('$banner', '$nama_file', '$status')");
                if($insert){
                    echo "<script>alert('Data Berhasil Dimasukkan');document.location='home.php?page=bannerList'</script>";
                }
                else{
                    echo "<script>alert('Data Gagal Dimasukkan');document.location='home.php?page=bannerForm'</script>";
                }
                
        }
            if(isset($_POST['updateBanner'])){
                $banner = htmlspecialchars(mysqli_real_escape_string($kon, $_POST['banner']));
                $status = htmlspecialchars(mysqli_real_escape_string($kon, $_POST['status']));
        
                    $nama_file = $_FILES["gambarBanner"]["name"];
                    move_uploaded_file($_FILES["gambarBanner"]["tmp_name"], "../img/".$nama_file);

                    $query= mysqli_query($kon, "UPDATE banner SET banner='$banner',status='$status',gambar='$nama_file' WHERE banner_id='".$_GET['id']."'");
                    if($query){
                     echo"<script>alert('Data berhasil diupdate');document.location='home.php?page=bannerList'</script>";
                    }
                    else{
                        echo "<script> alert('Data Gagal diupdate');</script>";
                    }
            }

?>
</body>
</html>