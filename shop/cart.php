<div class="daftarCart">
    <h1>CART</h1>

    <?php
    if(empty($_SESSION['username'])){
      ?>
        <p>CART IS EMPTY</p>
        <a href="index.php?page=store" style="text-decoration:none;">
            <div class="backFromCart" style="">BACK TO STORE</div>
        </a>
      <?php
    }
    else{
      $user = $_SESSION['username'];
      $daftarBarang = tampil("SELECT * FROM cart WHERE customer = '$user'");
      $produk = mysqli_query($kon, "SELECT * FROM cart WHERE customer = '$user'");
      if(mysqli_num_rows($produk) > 0){
      ?>  
      <table width="90%"> 
          <tr>
              <th width="10%">Gambar</th>
              <th width="25%">Nama Barang</th>
              <th width="20%">Harga</th>
              <th width="5%">QTY</th>
              <th width="25%">Total</th>
              <th width="5%"></th>
          </tr>
          <?php
                include '../admin/dbUpdate.php';
  
                $sql = "SELECT * FROM cart WHERE customer='$user'";
                $query = $db->prepare($sql);
                $query->execute();
  
              ?>
              <script>
  
                function activate(element){
                  // alert('klik');
                }
                function updateValue(element, column, id){
                    var value = element.innerText
                    
                    $.ajax({
                      url :'prosesUpdateCart.php',
                      type : 'post',
                      data:{
                        value : value,
                        column: column,
                        id : id
                      },
                      success:function(php_result){
                        window.location.reload();
                      }
                    })
                }
  
              </script>
              
              <?php
                $subtotal = 0;
                while($row = $query->fetch()){
                    $idB = ($row['id']);
                    $id = md5($row['id']);
                    $nb = $row['namaBarang'];
                    $hb = $row['hargaBarang'];
                    $qty = $row['qty'];
                    $total = $row['totalHarga'];
                    $subtotal = $subtotal + $total; 
                  ?>
                  <tr>
                      <td><img src="../img/baju/<?php echo $row['fotoBarang'] ?>" width="50px" style="margin:5px;"></td>
                      <td><div><?php echo $nb;?></div></td>
                      <td><div><?php echo $hb;?></div></td>
                      <td><div contenteditable="true" onBlur="updateValue(this,'qty','<?php echo $id ?>')" onClick="activate(this)" style="background : none; color:black; border-bottom : 2px solid gray; margin:5px 0px;"><?php echo $qty;?></div></td>
                      <td><div><?php echo $total;?></div></td>
                      <td><div><a onclick="return confirm('Are you sure to Delete this Product From Cart?')" href="prosesDeleteCart.php?id=<?php echo $idB ?>"><i class="fa fa-times" style="font-size:25px;color:red"></i></a></div></td>
                  </tr>
                  <?php
                }
              ?>
             <?php echo "<tr>
				<td colspan='4'><b>Sub Total</b></td>
				<td><b>".$subtotal."</b></td>
				<td></td>
			  </tr>";
      echo"</table>";
      ?>
			<div id="lanjutPemesanan">
				<a id="checkout" href="index.php?page=checkout">CHECKOUT NOW</a>
			</div>
		<?php
       }
      else{
        ?>
        <p>CART IS EMPTY</p>
        <a href="index.php?page=store" style="text-decoration:none;">
            <div class="backFromCart" style="">BACK TO STORE</div>
        </a>
      <?php
      } 
    }
?>

    
</div>
