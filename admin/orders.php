        <div class="title">
        	<h1>ORDERS</h1>
        </div>
          <div class="mainAdmin">
          <?php
          $akun = $_SESSION['username'];
          $check_level = mysqli_query($kon,"SELECT * FROM akun WHERE username = '$akun'");
          $cek =mysqli_fetch_assoc($check_level);
          $level = $cek['level'];
          
	if($level == 0){
    // $queryPesanan = mysqli_query($kon, "SELECT o.id,o.account,o.nama,o.alamat,o.nomor,o.tanggalPemesanan,o.kota,k.namaKota,k.tarif FROM orders AS o JOIN kota AS k ON k.namaKota=o.kota ORDER BY orders.tanggalPemesanan DESC");
    $queryPesanan = mysqli_query($kon, "SELECT * FROM orders ORDER BY id DESC");
	}else{
    // $queryPesanan = mysqli_query($kon, "SELECT o.id,o.account,o.nama,o.alamat,o.nomor,o.tanggalPemesanan,o.kota,k.namaKota,k.tarif FROM orders AS o JOIN kota AS k ON k.namaKota=o.kota WHERE orders.account='$akun' ORDER BY orders.tanggalPemesanan DESC");
    $queryPesanan = mysqli_query($kon,"SELECT * FROM orders WHERE account=$akun");
	}
	
	if(mysqli_num_rows($queryPesanan) == 0){
		echo "<h3>Saat ini belum ada data pesanan</h3>";
	}
	else{
	
		echo "<table class='table-list'>
				<tr class='baris-title'>
					<th class='kiri'>Nomor Faktur</th>
					<th class='kiri'>Tanggal</th>
					<th class='kiri'>Status</th>
					<th class='kiri'>Nama Akun</th>
					<th class='kiri'>Nama Penerima</th>
					<th class='kiri'>Aksi</th>
				</tr>";
		
		while($row=mysqli_fetch_assoc($queryPesanan)){
      
			echo "<tr>
					<td class='kiri'>$row[id]</td>
					<td class='kiri'>$row[tanggalPemesanan]</td>
					<td class='kiri' style='font-size:12px;'>$row[status]</td>
					<td class='kiri'>$row[account]</td>
					<td class='kiri'>$row[nama]</td>
					<td class='kiri'>
						<a class='tombol-action' href='../shop/index.php?page=konfirmasiPembayaran&id=$row[id]'>Detail Pesanan</a>
						<a class='tombol-action' href='home.php?page=updateStatus&id=$row[id]'>Update Status</a>
					</td>
				 </tr>";
		
		}
		echo "</table>";
	}
	
?>
</div>
        