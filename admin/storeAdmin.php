<div class="title">
          <h1>STORE ADMIN</h1>
        </div>
        <div class="mainAdmin">
          <table>
              <tr>
                <th>ID Barang</th>
                <th>Merk Barang</th>
                <th>Kategori Barang</th>
                <th>Stock</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
              <?php foreach($daftarBarang as $row) : ?>
                <tr>
                  <td><?= $row["id"]; ?></td>
                  <td><?= $row["mBarang"]; ?></td>
                  <td><?= $row["jBarang"]; ?></td>
                  <td><?= $row["stock"]; ?></td>
                  <td>Rp.<?= $row["harga"]; ?></td>
                  <td><img src="../img/baju/<?php echo $row['foto'] ?>" width="50px" style="margin:5px;"></td>
                  <td>.....</td>
                  <td><a href="home.php?page=ubahBarang&id=<?php echo $row["id"];?>">UBAH</a></td>
                </tr>
              <?php endforeach;?>
            </table>
          </div>