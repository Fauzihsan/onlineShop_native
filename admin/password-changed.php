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
    <title>PASSWORD CHANGED IS SUCCESS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
