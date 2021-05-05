<?php
    require '../admin/koneksi.php';
    session_start();
    if(empty($_SESSION['username'])){
        echo"<script>alert('SILAHKAN LOGIN TERLEBIH DAHULU!');document.location='../admin/index.php'</script>";
    }
    else{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = mysqli_query($kon, "SELECT * FROM barang WHERE id=$id");
            $result = mysqli_fetch_array($query);
            
            $namaBarang = $result['mBarang'];
            $hargaBarang = $result['harga'];
            $qty = 1;
            $totalHarga = $hargaBarang*$qty;
            $customer = $_SESSION['username'];
            $fotoBarang = $result['foto'];
    
            

            $addCart = mysqli_query($kon, "INSERT INTO cart(idBarang,namaBarang,hargaBarang,qty,totalHarga,customer,fotoBarang) VALUES('$id','$namaBarang','$hargaBarang','$qty', '$totalHarga','$customer','$fotoBarang')");
    
            if($addCart){
                echo"<script>alert('SUKSES MENAMBAH KE KERANJANG!');document.location='index.php?page=store'</script>";
            }
            else{
                echo"<script>alert('GAGAL MENAMBAH KE KERANJANG!');document.location='index.php?page=store'</script>";
            }
        }
    }
?>