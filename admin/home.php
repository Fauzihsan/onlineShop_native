<?php
  require_once "controllerUserData.php";
  $daftarBarang = tampil("SELECT * FROM barang");
  
  if(empty($_SESSION['username'])){
    echo"<script>alert('AKSES DITOLAK,SILAHKAN LOGIN TERLEBIH DAHULU!');document.location='index.php'</script>";
  }
  if($_SESSION['level'] == 1){
    echo"<script>alert('AKSES DITOLAK!');document.location='../shop/index.php?page=home'</script>";
  }
$username = $_SESSION['username'];
$sql = "SELECT * FROM akun WHERE username = '$username'";
$run_Sql = mysqli_query($kon, $sql);
if($run_Sql){
  $fetch_info = mysqli_fetch_assoc($run_Sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" href="../css/styleHome.css">
    <script src="../js/kitFontAwesome.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ajax.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../css/sweetalert2.min.css">

    <script type="text/javascript"> 
      function display_c(){
      var refresh=1000; // Refresh rate in milli seconds
      mytime=setTimeout('display_ct()',refresh)
      }

      function display_ct() {
        var x = new Date()
        var x1=new String();
      var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
      namahari = namahari.split(" ");
      var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
      namabulan = namabulan.split(" ");
      var tgl = new Date();
      var hari = tgl.getDay();
      var tanggal = tgl.getDate();
      var bulan = tgl.getMonth();
      var tahun = tgl.getFullYear();
      x1 = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun; 
      x1 = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds();
        document.getElementById('ct').innerHTML = x1;
        display_c();}
      </script>

    <script>
      function logoutConfirm(){
        document.querySelector(".logout").addEventListener('click', function(){
          swal({
            title : '<p style="color : white; font-size:18px; text-shadow: 2px 2px #000000;">Are you sure to Logout?</p>',
            showCancelButton : true,
            confirmButtonText : '<a href="prosesLogout.php" style="text-decoration:none; color:white;">Confirm</a>',
            confirmButtonColor : "#202f8a",
            background : "linear-gradient(to right, #192888, #4151c0)",
          });
        });
      }
    </script>
    
</head>

<body onload="display_ct();">

<div class="modal fade" id="insertBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="height:1000px; 
  transition: all .5s ease;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="form-group">
                  <label>Merk Barang</label>
                  <input type="text" name="mBarang" class="form-control" placeholder="Masukan Merk Barang" autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label>Kategori Barang </label>
                  <select name="jBarang" class="form-control" required >
                      <option selected disabled>Pilih Kategori :</option>
                      <option value="Kaos Polos">Kaos Polos</option>
                      <option value="Art">Art</option>
                      <option value="3Second">3Second</option>
                      <option value="Greenlight">Greenlight</option>
                      <option value="Eiger">Eiger</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Stock Barang </label>
                  <input type="number" name="stock" class="form-control" min="0" placeholder="Stock" autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label>Harga Barang </label>
                  <input type="number" name="harga" class="form-control" min="0" placeholder="Harga" autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label>Foto Barang</label>
                  <input type="file" name="gambar" class="form-control" style="background:transparent; color:white; border:none;" required>
              </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" name="insertData" class="btn btn-primary" 
            style=" background-image: linear-gradient(to right, #192888, #213092);">
            Insert Data
            </button>
          </div>
      
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="updateBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="height:100%; width:100%; 
  transition: all .5s ease;">
  <div class="modal-dialog">
    <div class="modal-content" style="width:700px; margin-left:-100px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
        <div class="daftarBar">
          <table style="width:100%; height:100%;text-align : center; overflow: visible; line-height : 40px;">
            <tr>
              <th>ID Barang</th>
              <th>Merk Barang</th>
              <th>Kategori Barang</th>
              <th>Stock</th>
              <th>Harga</th>
              <th>Gambar</th>
            </tr>
            

            <?php
              include 'dbUpdate.php';

              $sql = "SELECT * FROM barang";
              $query = $db->prepare($sql);
              $query->execute();

            ?>
            <script>

              function activate(element){
                // alert('klik');
              }
              function updateValue(element, column, id){
                  var value = element.innerText
                  
                  $.ajax({
                    url :'prosesUpdate.php',
                    type : 'post',
                    data:{
                      value : value,
                      column: column,
                      id : id
                    },
                    success:function(php_result){
                      console.log(php_result);
                    }
                  })
              }
              function refresh() {
                window.location.reload();
              }

            </script>
            
            <?php
              
              while($row = $query->fetch()){
                  $idB = ($row['id']);
                  $id = md5($row['id']);
                  $mb = $row['mBarang'];
                  $jb = $row['jBarang'];
                  $sk = $row['stock'];
                  $harga = $row['harga'];
                ?>
                <tr>
                  <td><div><?php echo $idB;?></div></td>
                  <td><div><?php echo $mb;?></div></td>
                  <td><div><?php echo $jb;?></div></td>
                  <td><div contenteditable="true" onBlur="updateValue(this,'stock','<?php echo $id ?>')" onClick="activate(this)" style="background : none; color:white; border-bottom : 2px solid gray; margin:0px 5px;"><?php echo $sk;?></div></td>
                  <td><div contenteditable="true" onBlur="updateValue(this,'harga','<?php echo $id ?>')" onClick="activate(this)" style="background : none; color:white; border-bottom : 2px solid gray; margin:0px 5px;"><?php echo $harga;?></div></td>
                  <td><img src="../img/baju/<?php echo $row['foto'] ?>" width="50px" style="margin:5px;"></td>
                </tr>
                <?php
              }
            ?>
            
          </table>
        </div>
          <div class="modal-footer" style="margin-top:20px;">

            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" name="updateData" class="btn btn-primary" 
            style=" background-image: linear-gradient(to right, #192888, #213092);" onclick="refresh()">
            Update Data
            </button>
          </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="deleteBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="height:100%; width:100%;
  transition: all .5s ease;">
  <div class="modal-dialog">
    <div class="modal-content" style="width:700px; margin-left:-100px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
        <div class="daftarBar">
          <table style="width:100%; height:100%;text-align : center; overflow: visible; line-height : 40px;">
            <tr>
              <th>ID Barang</th>
              <th>Merk Barang</th>
              <th>Kategori Barang</th>
              <th>Stock</th>
              <th>Harga</th>
              <th>Gambar</th>
            </tr>
            <?php
              $sql = mysqli_query($kon, "SELECT * FROM barang ORDER BY id ASC");
              $no=1;

              while($data = mysqli_fetch_array($sql)){
                ?>
                <tr style="border-bottom : 1px solid white;">
                  <td><?php echo $data['id']?></td>
                  <td><?php echo $data['mBarang']?></td>
                  <td><?php echo $data['jBarang']?></td>
                  <td><?php echo $data['stock']?></td>
                  <td><?php echo $data['harga']?></td>
                  <td><img src="../img/baju/<?php echo $data['foto'] ?>" width="50px" style="margin:5px;"></td>
                  <td><a onclick="return confirm('Are you sure to Delete this Product?')" href="prosesDelete.php?Del=<?php echo $data['id']; ?>"><i class="fas fa-trash" style="font-size:25px;color:red"></i></a></td>
                </tr>
                <?php
                $no++;
              }
            ?>
          </table>

        </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" name="deleteData" class="btn btn-primary" 
            style=" background-image: linear-gradient(to right, #192888, #213092);" onclick="refresh()">
            DONE
            </button>
          </div>
    </div>
  </div>
</div>


<div class="modal fade" id="viewBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="height:100%; width:100%;
  transition: all .5s ease;">
  <div class="modal-dialog">
    <div class="modal-content" style="width:700px;  margin-left:-100px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar Barang</h5>
        <div class="info">
        <div id='ct'></div>
        <div id="user"><?php echo $fetch_info['username'] ?></div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
        <div class="daftarBar">
          <table style="width:100%; height:100%;text-align : center; overflow: visible; line-height : 40px;">
            <tr>
              <th>ID Barang</th>
              <th>Merk Barang</th>
              <th>Kategori Barang</th>
              <th>Stock</th>
              <th>Harga</th>
              <th>Gambar</th>
            </tr>
            <?php foreach($daftarBarang as $row) : ?>
              <tr>
                <td><?= $row["id"]; ?></td>
                <td><?= $row["mBarang"]; ?></td>
                <td><?= $row["jBarang"]; ?></td>
                <td><?= $row["stock"]; ?></td>
                <td>Rp.<?= $row["harga"]; ?></td>
                <td><img src="../img/baju/<?php echo $row['foto'] ?>" width="50px" style="margin:5px;"></td>
              </tr>
            <?php endforeach; ?>
          </table>

        </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" name="insertData" class="btn btn-primary" 
              style=" background-image: linear-gradient(to right, #192888, #213092);">
            <a href="laporan.php" style="text-decoration:none; color:white;" target="_blank"><i class="fas fa-print" style="margin-right : .5em;"></i>PDF</a>
            </button>
          </div>
      
    </div>
  </div>
</div>

      <input type="checkbox" id="check">
      <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
      </label>
      <div class="sidebar">
        <header>KaosCC</header>
        <ul>
          <li><a href="home.php?page=dashboard"><i class="fa fa-tachometer-alt"></i>Dashboard</a></li>
          <li><a href="home.php?page=storeAdmin"><i class="fas fa-store"></i>Store</a></li>
          <li><a href="home.php?page=orders"><i class="fas fa-sort-amount-down-alt"></i>Orders</a></li>
          <li><a href="home.php?page=bannerList"><i class="fas fa-image"></i>Banner</a></li>
          <li><a href="change-password.php"><i class="fas fa-tools"></i>Change Password</a></li>
          <li><button onclick="logoutConfirm()" class="logout"><i class="fas fa-power-off"></i>Logout</button></li>
        </ul>
      </div>

  <div class="bodi">
    <?php
        if(isset($_GET['page'])){
          $halaman = $_GET['page'];
          require($halaman.'.php');
        }
        else{
          require('dashboard.php');
        }
    ?>
  </div>

</body>
</html>