<div class="slideshow-container-banner" style="width:100%;">
                <?php
                    $banner = mysqli_query($kon, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id ASC");
                        while($p = mysqli_fetch_array($banner)){
                ?>
                <div class="mySlidesBanner fadeBanner">
                <img src="../img/<?php echo $p['gambar'] ?>" width="100%" >
                </div><?php } ?> 
        </div>

<div class="containerHome" style="padding:10px 10px;">
    <div class="recentPost" style="width:100%; outline:1px solid black;">
    <h1 style="text-align:center; margin:20px 0px;">RECENT POST</h1>
    <?php
        $produk = mysqli_query($kon, "SELECT * FROM barang ORDER BY id DESC LIMIT 4");
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
    </div>
    <div id="formSlide">
    <a href="index.php?page=other">
        <div class="slideshow-container-polos" style="width:100%;float:left;">
                <h2>Kaos Polos</h2>
                <?php
                    $produk = mysqli_query($kon, "SELECT * FROM barang WHERE jBarang='Kaos Polos' ORDER BY id ASC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                <div class="mySlidesPolos fadePolos">
                <img src="../img/baju/<?php echo $p['foto'] ?>" width="300px">
                </div><?php }} else{ ?>
                    <p>Produk Tidak Tersedia</p>
                <?php } ?> 

        </div>
    </a>

    <a href="index.php?page=ourDesign">
        <div class="slideshow-container-art" style="width:100%;float:left;">
            <h2>Art</h2>
                <?php
                    $produk = mysqli_query($kon, "SELECT * FROM barang WHERE jBarang='Art' ORDER BY id ASC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                <div class="mySlidesArt fadeArt">
                <img src="../img/baju/<?php echo $p['foto'] ?>" width="300px">
                </div><?php }} else{ ?>
                    <p>Produk Tidak Tersedia</p>
                <?php } ?> 
        </div> 
    </a>

    <a href="index.php?page=store">
        <div class="slideshow-container-brands" style="width:100%;float:left;">
        <h2>Top Brands</h2>
                <?php
                    $produk = mysqli_query($kon, "SELECT * FROM barang WHERE jBarang='3Second' || jBarang='Greenlight' || jBarang='Eiger' ORDER BY id ASC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                <div class="mySlidesBrands fadeBrands">
                <img src="../img/baju/<?php echo $p['foto'] ?>" width="300px">
                </div><?php }} else{ ?>
                    <p>Produk Tidak Tersedia</p>
                <?php } ?> 
        </div>
    </a>   
    </div>
    <script>
var slideIndex1 = 0;
showSlidesPolos();

function showSlidesPolos() {
  var i;
  var slidesPolos = document.getElementsByClassName("mySlidesPolos");
  for (i = 0; i < slidesPolos.length; i++) {
    slidesPolos[i].style.display = "none";  
  }
  slideIndex1++;
  if (slideIndex1 > slidesPolos.length) {slideIndex1 = 1}    
  slidesPolos[slideIndex1-1].style.display = "block";  
  setTimeout(showSlidesPolos, 2000); // Change image every 2 seconds
}
</script>

<script>
var slideIndex2 = 0;
showSlidesArt();

function showSlidesArt() {
  var j;
  var slidesArt = document.getElementsByClassName("mySlidesArt");
  for (j = 0; j < slidesArt.length; j++) {
    slidesArt[j].style.display = "none";  
  }
  slideIndex2++;
  if (slideIndex2 > slidesArt.length) {slideIndex2 = 1}    
  slidesArt[slideIndex2-1].style.display = "block";  
  setTimeout(showSlidesArt, 3000); // Change image every 2 seconds
}
</script>

<script>
var slideIndex3 = 0;
showSlidesBrands();

function showSlidesBrands() {
  var k;
  var slidesBrands = document.getElementsByClassName("mySlidesBrands");
  for (k = 0; k < slidesBrands.length; k++) {
    slidesBrands[k].style.display = "none";  
  }
  slideIndex3++;
  if (slideIndex3 > slidesBrands.length) {slideIndex3 = 1}    
  slidesBrands[slideIndex3-1].style.display = "block";  
  setTimeout(showSlidesBrands, 2000); // Change image every 2 seconds
}
</script>

<script>
var slideIndex4 = 0;
showSlidesBanner();

function showSlidesBanner() {
  var l;
  var slidesBanner = document.getElementsByClassName("mySlidesBanner");
  for (l = 0; l < slidesBanner.length; l++) {
    slidesBanner[l].style.display = "none";  
  }
  slideIndex4++;
  if (slideIndex4 > slidesBanner.length) {slideIndex4 = 1}    
  slidesBanner[slideIndex4-1].style.display = "block";  
  setTimeout(showSlidesBanner, 3000); // Change image every 2 seconds
}
</script>
  
</div>       
