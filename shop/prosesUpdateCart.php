<?php
    include '../admin/dbUpdate.php';

    if(isset($_POST['id'])){
        $value = $_POST['value'];
        $column = $_POST['column'];
        $id = $_POST['id'];

        $sql = "UPDATE cart SET $column= :value, totalHarga = hargaBarang*$value WHERE md5(id) = :id";
        $query = $db->prepare($sql);
        $query->bindParam('value',$value);
        $query->bindParam('id',$id);
        
        if($query->execute()){
            echo "Update Successfull";
        }else{
            echo "Failure"; 
        }
    }
?>