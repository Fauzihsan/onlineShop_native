<?php
    $id = $_GET['id'];
    $produk = mysqli_query($kon, "SELECT * FROM barang WHERE id = '$id'");
    if(mysqli_num_rows($produk) > 0){
        $p = mysqli_fetch_array($produk)
    ?>
        <div class="detailProduk">
            <table width="100%">
                <tr>
                    <td width="550px"><img src="../img/baju/<?php echo $p['foto'] ?>" width="500px"></td>
                    <td>
                        <h1><?php echo $p['mBarang'] ?></h1>
                        <h5>Category : <?php echo $p['jBarang']?></h5>
                        <h5>Stock : <?php echo $p['stock']?></h5>
                        <h5>Harga : Rp.<?php echo $p['harga']?></h5>
                        <h5>Deskripsi : <br></h5>
                        <br>
                        <p><?php echo $p['deskripsi']?></p>
                        <br>
                        <a href="prosesInsertCart.php?id=<?php echo $p['id'] ?>" style="text-decoration:none; margin-left:200px;"><div class="addToCart">ADD TO CART</div></a>
                    </td>
                </tr>
            </table>
        </div>
    <?php
    }
?>
