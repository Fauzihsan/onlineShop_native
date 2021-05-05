<?php

	$akun = $_SESSION['username'];
	$masuk= mysqli_query($kon, "INSERT INTO praorders(id,account) VALUES('','$akun')");
?>

<div class="mainCheckout">
<div id="frame-data-pengiriman">

	<h3 class="label-data-pengiriman">Alamat Pengiriman Barang</h3>
	
	<div id="frame-form-pengiriman">
	
		<form action="" method="POST">
			<div class="element-form">
				<label>Nama Penerima</label>
				<span><input type="text" name="namaPenerima" required></span>
			</div>		

			<div class="element-form">
				<label>Nomor Telepon</label>
				<span><input type="text" name="nomorPenerima" required></span>
			</div>		
			
			<div class="element-form">
				<label>Alamat Pengiriman</label>
				<span><textarea name="alamat" required></textarea></span>
			</div>			
			
			<div class="element-form">
				<label>Kota</label>
				<span>
                    <select name="kota" required>
                      <option selected disabled>Kota ---- Ongkos Kirim :</option>
						<?php
							$query = mysqli_query($kon, "SELECT * FROM kota");
							
							while($row=mysqli_fetch_assoc($query)){
								echo "<option value='$row[namaKota]'>$row[namaKota]  ---  Rp.$row[tarif]</option>";
                            }
                            ?>
					</select>
				</span>
			</div>			

			<div class="element-form">
				<span><input type="submit" value="submit" name="nextCheckout"></span>
			</div>			
			
		</form>
	</div>
</div>

<div id="frame-data-detail">
	<h3 class="label-data-pengiriman">Detail Order</h3>
	
	<div id="frame-detail-order">
		
		<table class="table-list">
			<tr>
				<th class='kiri'>Nama Barang</th>
				<th class='tengah'>Qty</th>
				<th class='kanan'>Total</th>
			</tr>
			
            <?php
            $user = $_SESSION['username'];
            $daftarBarang = tampil("SELECT * FROM cart WHERE customer = '$user'");
            $produk = mysqli_query($kon, "SELECT * FROM cart WHERE customer = '$user'");
            include '../admin/dbUpdate.php';
          
            $sql = "SELECT * FROM cart WHERE customer='$user'";
            $query = $db->prepare($sql);
            $query->execute();  
				$subtotal = 0;
                while($row = $query->fetch()){
                    $idB = ($row['id']);
                    $id = md5($row['id']);
                    $nb = $row['namaBarang'];
                    $qty = $row['qty'];
                    $total = $row['totalHarga'];
                    $subtotal = $subtotal + $total; 
					
					echo "<tr>
							<td class='kiri'>$nb</td>
							<td class='tengah'>$qty</td>
							<td class='kanan'>$total</td>
						</tr>";
				}
				echo "<tr>
						<td colspan='2' class='kanan'><b>Sub Total</b></td>
						<td class='kanan'><b>$subtotal</b></td>
					 </tr>";				
				
			?>
			
		</table>
		
	</div>
</div>
</div>