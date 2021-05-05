<?php
    $sql = mysqli_query($kon, "SELECT * FROM orders WHERE id = '".$_GET['id']."' ");
    $p = mysqli_fetch_array($sql)
?>
    <form action="" method="post">
        <div class="ubahBarang">
            <div class="form-group">
                  <label>Nomor Faktur</label>
                  <input type="text" name="nomorFaktur" class="form-control" autocomplete="off" required value="<?= $p["id"]; ?>">
              </div>
              <div class="form-group">
                  <label>Status </label>
                  <select name="status" class="form-control" required>
                      <option value="<?= $p['status'];?>" selected disabled><?= $p['status'];?></option>
                      <option value="Dalam Pengemasan">Menunggu Pembayaran</option>
                      <option value="Dalam Pengemasan">Dalam Pengemasan</option>
                      <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                      <option value="Telah Diterima">Telah Diterima</option>
                  </select>
              </div>
                <button tpye="submit" name="updateStatus" class="btn btn-primary" >UPDATE</button>
        </div>
    </form>