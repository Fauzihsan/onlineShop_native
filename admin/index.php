<?php require_once "controllerUserData.php"; ?>
<?php 
  if(!empty($_SESSION['username']) && $_SESSION['level'] == 0){
    echo"<script>alert('SILAHKAN LOGOUT TERLEBIH DAHULU!');document.location='home.php'</script>";
  }
  else if(!empty($_SESSION['username']) && $_SESSION['level'] == 1){
    echo"<script>alert('SILAHKAN LOGOUT TERLEBIH DAHULU!');document.location='http://localhost/kaoscustomcianjur/shop/index.php?page=home'</script>";
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <link rel="icon" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleIndex.css">
    <script src="../js/jquery.min.js"></script>
</head>
<body>
    <section class="login-page">
        <form action="index.php" method="POST">  
            <div class="box">
                <div class="header-form">
                  <div class="logo"><a href="../shop/"><img src="../img/newLogo.png" width="400px" alt=""></a></div>
                </div>
                <div class="body-form">
                <script language="javascript" type="text/javascript">
                  function removeSpaces(string) {
                  return string.split(' ').join('');
                  }
                </script>
                    <input type="text" placeholder="username" name="username" autocomplete="off" maxlength="11" required autofocus onkeyup="this.value=removeSpaces(this.value);">
                    <input type="password" onkeyup="trigger()" class="inputPassword" placeholder="password" name="password" autocomplete="off" required>
                    <span class="showPass">SHOW</span>  
                    <a href="forgot-password.php" style="text-decoration: none; font-weight: bold; color: white; font-size: 16px; margin-left: 23em;">Forgot Password?</a>
                </div>
                <div class="footer-form">
                    <input type="submit" name="login" value="LOGIN" class="log">
                </div>
                <div class="signup">
                    <a href="daftar.php" style="text-decoration: none; font-weight: bold; color: wheat;">Sign Up</a>
                    
                </div>
                <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="errorMessage">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
            </div>
        </form>
        
        <script>
          const inputPassword = document.querySelector(".inputPassword");
          const showPass = document.querySelector(".showPass");
          function trigger(){
            if(inputPassword.value != ""){
              showPass.style.display = "block";
              showPass.onclick = function(){
                if(inputPassword.type == "password"){
                  inputPassword.type = "text";
                  showPass.textContent = "HIDE";
                  showPass.style.color = "white";
                }else{
                  inputPassword.type = "password";
                  showPass.textContent = "SHOW";
                  showPass.style.color = "white";
                }
              }
            }else{
              showPass.style.display = "none";
            }
          }
            </script>
    </section>
</body>
</html>