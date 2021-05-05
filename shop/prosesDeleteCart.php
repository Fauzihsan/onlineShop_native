<?php
    require('../admin/koneksi.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM cart WHERE id = '".$id."'";
        $result = mysqli_query($kon, $query);
        if($result){
            echo"<script>alert('REMOVE SUCCESS');document.location='index.php?page=cart'</script>";
        }
        else{
            echo 'Please Check your query';
        }
    }
    else{
        header("location:index.php?page=cart");
    }
?>