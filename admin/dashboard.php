        <div class="title">
          <h1>Welcome, Hello <?php echo $fetch_info['username'] ?></h1>
        </div>
        <div class="kartu">
            <div class="card1" data-toggle="modal" data-target="#insertBarang">
                <img src="../img/insert.svg" alt="">
                <h2>INSERT</h2>
                <p>Pilih Kartu ini jika anda akan memasukkan barang baru</p>
            </div>
            
            <div class="card2" data-toggle="modal" data-target="#updateBarang">
                <img src="../img/update.svg" alt="">
                <h2>UPDATE</h2>
                <p>Pilih Kartu ini jika anda akan memperbaharui stock</p>
            </div>
            
            <div class="card3"  data-toggle="modal" data-target="#deleteBarang">
                <img src="../img/delete.svg">
                <h2>DELETE</h2>
                <p>Pilih Kartu ini jika anda akan menghapus barang</p>
            </div>

            <div class="card4" data-toggle="modal" data-target="#viewBarang">
                <img src="../img/view.svg" alt="">
                <h2>VIEW</h2>
                <p>Pilih Kartu ini jika anda akan melihat daftar barang dan stock</p>
            </div>
        </div>