<?php
	$query = mysqli_query($kon, "SELECT o.id,o.account,o.nama,o.alamat,o.nomor,o.tanggalPemesanan,o.kota,k.namaKota,k.tarif FROM orders AS o JOIN kota AS k ON k.namaKota=o.kota AND o.id = '".$_GET['id']."'");
	$row=mysqli_fetch_assoc($query);

    $nomorFaktur = $row['id'];
	$tanggalPemesanan = $row['tanggalPemesanan'];
	$akun = $row['account'];
	$nomor_telepon = $row['nomor'];
	$alamat = $row['alamat'];
	$tarif = $row['tarif'];
	$nama = $row['nama'];
	$kota = $row['namaKota'];
	
?>

<div class="kontenKonfirmasi">
<div id="frame-faktur">

	<h3><center>Detail Pesanan</center></h3>
	
	<hr/>
	
	<table width="60%">
	
		<tr>
			<td>Nomor Faktur</td>
			<td>:</td>
			<td><?php echo $nomorFaktur; ?></td>
		</tr>
		<tr>
			<td>Nama Pemesan</td>
			<td>:</td>
			<td><?php echo $akun; ?></td>
		</tr>
		<tr>
			<td>Nama Penerima</td>
			<td>:</td>
			<td><?php echo $nama; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $alamat; ?></td>
		</tr>
		<tr>
			<td>Nomor Telepon</td>
			<td>:</td>
			<td><?php echo $nomor_telepon; ?></td>
		</tr>		
		<tr>
			<td>Tanggal Pemesanan</td>
			<td>:</td>
			<td><?php echo $tanggalPemesanan; ?></td>
		</tr>		
	</table>	
</div>	

	<table class="table-list">
	
		<tr class="baris-title">
			<th class="no">No</th>
			<th class="kiri">Nama Barang</th>
			<th class="tengah">Qty</th>
			<th class="kanan">Harga Satuan</th>
			<th class="kanan">Total</th>
		</tr>
		
		<?php
			$cariUser = mysqli_query($kon, "SELECT id FROM orders WHERE id='".$_GET['id']."'");
			$row = mysqli_fetch_assoc($cariUser);

			$user = $row['id'];
			$queryDetail = mysqli_query($kon, "SELECT b.id, b.mBarang, b.harga, c.qty FROM barang AS b JOIN orders_detail AS c ON c.nomorFaktur='$user' AND b.id=c.idBarang");
			
			$no = 1;
			$subtotal = 0;
			while($rowDetail=mysqli_fetch_assoc($queryDetail)){
			
				$total = $rowDetail["harga"] * $rowDetail["qty"];
				$subtotal = $subtotal + $total;
				
				echo "<tr>
						<td class='no'>$no</td>
						<td class='kiri'>$rowDetail[mBarang]</td>
						<td class='tengah'>$rowDetail[qty]</td>
						<td class='kanan'>$rowDetail[harga]</td>
						<td class='kanan'>$total</td>
					  </tr>";
				
				$no++;
			}
		
			$subtotal = $subtotal + $tarif;
		?>
		
		<tr>
			<td class="kanan" colspan="4">Biaya Pengiriman</td>
			<td class="kanan"><?php echo $tarif; ?></td>
		</tr>

		<tr>
			<td class="kanan" colspan="4"><b>Sub total</b></td>
			<td class="kanan"><b><?php echo $subtotal; ?></b></td>
		</tr>
		
	</table>
	
	<?php
		if($_SESSION['level'] == 1){
			?>

<div id="frame-keterangan-pembayaran">
		<p>Silahkan Lakukan pembayaran ke Bank BCA<br/>
		   Nomor Rekening : 1510-2001-7410 (A/N Muhammad Ihsan Fauzi Rahman).<br/>
		   Setelah melakukan pembayaran silahkan kirimkan bukti transfer/pembayaran
		   <a href="https://api.whatsapp.com/send?phone=6289658299085&text=Hello,%20Kaos%20Custom%20Cianjur.%20Saya%20ingin%20melakukan%20konfirmasi%20pembayaran%20terima%20kasih%20:)" target="_blank">Disini</a>.
		</p>

		<?php
		mysqli_query($kon, "DELETE FROM cart WHERE customer='$akun'");
		mysqli_query($kon, "DELETE FROM praorders WHERE account='$akun'");
		
		$user = $row['id'];
		$kurangStock = mysqli_query($kon, "SELECT b.id, b.stock, .b.mBarang, b.harga, c.qty FROM barang AS b JOIN orders_detail AS c ON c.nomorFaktur='$user' AND b.id=c.idBarang");
		$row = mysqli_fetch_assoc($kurangStock);

		$id=$row['id'];
		$stock = $row['stock'];
		$qty = $row['qty'];
		$newStock = $stock-$qty;
		$query=mysqli_query($kon, "UPDATE barang SET stock=$newStock WHERE id=$id");
		?>
	</div>
			<?php
		}
	?>
	</div>