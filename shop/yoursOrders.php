        
  <div class="kontenOrders">
          <div class="title">
          <h1>ORDERS</h1>
          </div>
          <?php
    if(empty($_SESSION['username'])){
      echo "<h3>Saat ini belum ada data pesanan</h3>";
    }
          else{
          $akun = $_SESSION['username'];
          $check_level = mysqli_query($kon,"SELECT * FROM akun WHERE username = '$akun'");
          $cek =mysqli_fetch_assoc($check_level);
          $level = $cek['level'];
          
    $queryPesanan = mysqli_query($kon,"SELECT * FROM orders WHERE account='$akun' ORDER BY id DESC");
	if(mysqli_num_rows($queryPesanan) == 0){
		echo "<h3>Saat ini belum ada data pesanan</h3>";
    }
    else{
		echo "<table class='table-list'>
				<tr class='baris-title'>
					<th class='kiri' width='20%'>Nomor Pesanan</th>
					<th class='kiri' width='20%'>Tanggal</th>
          <th class='kiri' width='30%'>Status</th>
					<th class='kiri' width='30%'>Action</th>
				</tr>";
                while($row=mysqli_fetch_assoc($queryPesanan)){
			echo "<tr>
					<td class='kiri'>$row[id]</td>
					<td class='kiri'>$row[tanggalPemesanan]</td>
          <td class='kiri'>$row[status]</td>
					<td class='kiri'>
						<a class='tombol-action' href='../shop/index.php?page=konfirmasiPembayaran&id=$row[id]'>Detail Pesanan</a>
					</td>
				 </tr>";
		
                }
        echo "</table>";
    }
}
?>
</div>