<?php
    $sql = mysqli_query($kon, "SELECT * FROM banner WHERE banner_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_array($sql);
    $status = $p['status'];
    $gambar = "<img src='../img/$p[gambar]' style='width: 200px;vertical-align: middle;' />";
        $keterangan_gambar = "(Silahkan Upload Ulang Gambar ini)";
?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="ubahBanner">
            <div class="form-group">
                  <label>Banner</label>
                  <input type="text" name="banner" class="form-control" autocomplete="off" required value="<?= $p["banner"]; ?>">
              </div>
              <div class="form-group">
                    <label>Gambar <br><?php echo $keterangan_gambar; ?></label>	<br>
		            <?php echo $gambar;?> <br> <br> <span><input type="file" name="gambarBanner" required/></span>
              </div>
              <div class="form-group">
                  <label>Status </label>
                  <span>
                    <input type="radio" value="on" name="status" required <?php if($status == "on"){ echo "checked"; } ?> /> On
                    <input type="radio" value="off" name="status" required <?php if($status == "off"){ echo "checked"; } ?> /> Off		
                </span>
              </div>
                <button tpye="submit" name="updateBanner" class="btn btn-primary" >UPDATE</button>
        </div>
    </form>