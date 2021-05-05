<div class="mainAdmin">
<div id="frame-tambah">
	<a class="tombol-action" href="home.php?page=bannerForm" style="margin-left:2%;">+ Tambah Banner</a>
</div>

<?php
    $no = 1;
          $banner = mysqli_query($kon,"SELECT * FROM banner  ");
          
	if(mysqli_num_rows($banner) == 0){
		echo "<h3>Banner Kosong</h3>";
	}
	else{
	
		echo "<table class='table-list'>
				<tr class='baris-title'>
					<th class='kiri'>No</th>
					<th class='kiri'>Banner</th>
					<th class='kiri'>Status</th>
					<th class='kiri'>Aksi</th>
				</tr>";
		
		while($row=mysqli_fetch_assoc($banner)){
      
			echo "<tr>
					<td class='kiri'>$no</td>
					<td class='kiri'>$row[banner]</td>
					<td class='kiri'>$row[status]</td>
					<td class='kiri'><a class='tombol-action' href='home.php?page=updateStatusBanner&id=$row[banner_id]'>Update Status</a></td>
				 </tr>";
		$no++;
		}
		echo "</table>";
	}
	
?>
</div>