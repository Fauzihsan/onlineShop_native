<?php
    $sql = mysqli_query($kon, "SELECT * FROM barang WHERE id = '".$_GET['id']."' ");
    $p = mysqli_fetch_array($sql)
?>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <form action="" method="post">
        <div class="ubahBarang">
            <div class="form-group">
                  <label>Merk Barang</label>
                  <input type="text" name="mBarang" class="form-control" placeholder="Masukan Merk Barang" autocomplete="off" required value="<?= $p["mBarang"]; ?>">
              </div>
              <div class="form-group">
                  <label>Kategori Barang </label>
                  <select name="jBarang" class="form-control" required>
                      <option value="<?= $p['jBarang'];?>"><?= $p['jBarang'];?></option>
                      <option value="Kaos Polos">Kaos Polos</option>
                      <option value="Art">Art</option>
                      <option value="3Second">3Second</option>
                      <option value="Greenlight">Greenlight</option>
                      <option value="Eiger">Eiger</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Stock Barang </label>
                  <input type="number" name="stock" class="form-control" min="0" placeholder="Stock" autocomplete="off" required value="<?= $p["stock"]; ?>">
              </div>
              <div class="form-group">
                  <label>Harga Barang </label>
                  <input type="number" name="harga" class="form-control" min="0" placeholder="Harga" autocomplete="off" required value="<?= $p["harga"]; ?>">
              </div>
              <div class="form-group">
                  <label>Foto Barang</label>
                  <img src="../img/baju/<?php echo $p['foto'] ?>" width="50px" style="margin:5px;">
                  <input type="file" name="gambarBarang" class="form-control" style="background:transparent; color:white; border:none;" required />
              </div>
              <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" rows="10" id="editor"><?php echo $p['deskripsi'] ?></textarea><br>
              </div>
                <button tpye="submit" name="updateDetail" class="btn btn-primary" >UPDATE</button>
        </div>
    </form>

    <script>
	    CKEDITOR.replace("editor");
    </script>