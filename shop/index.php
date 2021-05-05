<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.png">
    <title>KAOS CUSTOM CIANJUR</title>
    <link rel="stylesheet" href="../css/styleShop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/ajax.min.js"></script>	
    <script src="../js/Slides-SlidesJS-3/source/jquery.slides.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        $("#search").click(function(){
            $("#keyword").fadeIn(1000);
        });
        });
    </script>
</head>
<?php
    require('../admin/controllerUserData.php');
?>
<body>

    <div class="wrapper">
        <header class="header">
            <div class="top">
                <a href="index.php?page=home"><img class="logo" src="../img/LOGO.png" alt="" style="width:200px; height:100px;"></a>
                <form action="index.php?page=hasilPencarian" method="POST">
                <img id="search" class="search" src="../img/search.png" alt="" style="cursor:pointer;">
                    <input type="text" id="keyword" autocomplete="off" placeholder="Cari ..." name="keyword" style="position:absolute; width:250px; height:30px; display:none; outline:none; border:none; border-bottom:1px solid black; margin-top:30px; margin-left:55%;">
                    <button type="submit" name="cari" style="display:none;"></button>
                </form>
                <?php

                if(!empty($_SESSION['username'])){
                    ?>
                    <span><a onclick="return confirm('Do you want to Logout?')" href="../admin/prosesLogout.php" style="color:black;text-transform: uppercase;"><?php echo $_SESSION['username']?></a></span>
                    <?php
                }
                else{
                    ?>
                    <span><a href="../admin/index.php" style="color:black;">LOGIN / REGISTER</a></span>
                    <?php
                }
                ?>
            </div>
            
            <div class="jenis">
                <div class="home"><a href="index.php?page=home">HOME</a></div>
                <div class="store"><a href="index.php?page=store">STORE</a></div>
                <div class="custom"><a href="index.php?page=custom">CUSTOM ORDER</a></div>
                <div class="cart"><a href="index.php?page=cart">CART</a></div>
            </div>

            <div class="nav">
            <ul>
                <li><div class="greenlight"><a href="index.php?page=greenlight">GREENLIGHT</a></div></li>
                <li><div class="3second"><a href="index.php?page=3second">3SECOND</a></div></li>
                <li><div class="eiger"><a href="index.php?page=eiger">EIGER</a></div></li>
                <li><div class="other"><a href="index.php?page=other">OTHER BRANDS</a></div></li>
                <li><div class="pre"><a href="index.php?page=ourDesign">OUR DESIGN</a></div></li>
                <li><div class="all"><a href="index.php?page=store">BROWSE ALL</a></div></li>
            </ul>
        </div>
        </header>

        <div class="main">
            <?php
                if(isset($_GET['page'])){
                    $halaman = $_GET['page'];
                    require($halaman.'.php');
                }
                else{
                    require('home.php');
                }
            ?>
        </div>

        <footer class="footer">
        <div class="info">
            <div class="contact">
                <h5>CONTACT</h5>
                <div class="border"></div>
                <p>Jl. Dr Muwardi No. 15D <br>(Homestore Sementara Tutup)<br>Cianjur, 40254 Indonesia<br>+62 821 2000 0097 <br>admin@kaoscustomcianjur.id</p>
            </div>
            <div class="faq">
                <h5>FAQ</h5>
                <div class="border"> </div>
                <span><a href="index.php?page=yoursOrders">Pesanan Anda</a></span>
                <span><a href="index.php?page=caraPengembalian">Cara Pengembalian</a></span>
                <span><a href="index.php?page=persyaratanketentuan">Persyaratan & Ketentuan</a></span>
                <span><a href="index.php?page=kebijakanPrivasi">Kebijakan Privasi</a></span>
            </div>
            <div class="discover">
                <h5>DISCOVER</h5>
                <div class="border"></div>
                <span><a href="index.php?page=store">Lookbook</a></span>
                <span><a href="index.php?page=home">News</a></span>
                <span><a href="https://www.instagram.com/kaoscustomcianjur.id">About Us</a></span>
                <span><a href="mailto:muhammadihsan10.mifr@gmail.com">Contact Us</a></span>
                <span><a href="https://www.instagram.com/_fauzihsan">Stories</a></span>
            </div>
            <div class="subscribe">
                <h5>SUBSCRIBE</h5>
                <div class="border"></div>
                <div class="kontenSubs">
                    <p>Dapatkan potongan sebesar 20%.</p>
                    <form action="#">
                        <input type="text" placeholder="Your Email (required)" required class="email">
                        <input type="submit" value="SIGN UP" class="signup">
                    </form>
                </div>
            </div>
        </div>
        <div class="pay">
            <img src="../img/foot.jpg" alt="" style="width: 100%;">
        </div>
        <div class="copyright"><p align="center">Copyright © 2020 All Rights Reserved <b>Kaos Custom Cianjur</b></p></div>
        </footer>

        <div id="bt">
            <a href="#top"><span><img src="../img/top.png" width="40" height="40"></span></a>
        </div>
            <a href="https://api.whatsapp.com/send?phone=6289658299085&text=Hello,%20Kaos%20Custom%20Cianjur.%20Saya%20ingin%20memesan%20baju%20custom%20terima%20kasih%20:)"><img src="../img/wa.png" alt="" class="waIcon"></a>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var b = $('#bt');
            b.hide();
            $(window).on('scroll', function(){
                if ($(this).scrollTop() > 200) {
                    b.fadeIn();
                } else {
                    b.fadeOut();
                }
            });
            b.on('click', function(){
                $('html,body').animate({
                    scrollTop: 0
                }, 500 );
                return false;
            });
        });
    </script>
</body>
</html>

        