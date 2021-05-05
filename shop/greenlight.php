<h1 style="text-align:center; margin:20px 0px;">Greenlight</h1>
<?php
    $produk = mysqli_query($kon, "SELECT * FROM barang WHERE jBarang = 'Greenlight' ORDER BY id DESC");
    if(mysqli_num_rows($produk) > 0){
        while($p = mysqli_fetch_array($produk)){
?>
<a href="index.php?page=detailProduk&id=<?php echo $p['id'] ?>" style="text-decoration:none;">
    <div class="daftarBaju">
        <img src="../img/baju/<?php echo $p['foto'] ?>" width="300px">
        <p class="nama"><?php echo substr($p['mBarang'], 0, 27) ?></p>
        <p class="harga">Rp. <?php echo number_format($p['harga']) ?></p>
        <a href="prosesInsertCart.php?id=<?php echo $p['id'] ?>" style="text-decoration:none;"><div class="addToCart">ADD TO CART</div></a>
    </div>
</a>
    <?php }} else{ ?>
        <p>Produk Tidak Tersedia</p>
    <?php } ?>  
            
