<?php require_once "controllerUserData.php"; ?>
<?php 
if($_SESSION['info'] == false){
    header('Location: index.php');  
}
if(!empty($_SESSION['username']) && $_SESSION['level'] == 0){
    echo"<script>alert('SILAHKAN LOGOUT TERLEBIH DAHULU!');document.location='home.php'</script>";
  }
  else if(!empty($_SESSION['username']) && $_SESSION['level'] == 1){
    echo"<script>alert('SILAHKAN LOGOUT TERLEBIH DAHULU!');document.location='http://localhost/kaoscustomcianjur/shop/home.php'</script>";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>